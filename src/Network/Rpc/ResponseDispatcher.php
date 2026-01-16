<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\Rpc;

use ProtoBrick\MTProtoClient\Exception\ResendRequiredException;
use ProtoBrick\MTProtoClient\Exception\RpcErrorException;
use ProtoBrick\MTProtoClient\Exception\TransportException;
use ProtoBrick\MTProtoClient\Generated\Types\Base\Updates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesCombined;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShort;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortChatMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateShortSentMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdatesTooLong;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\MTProto\Constructors;
use ProtoBrick\MTProtoClient\TL\Serializer;
use Psr\Log\LoggerInterface;

class ResponseDispatcher
{
    /** @var array<string, int> Кэш ID обработанных сообщений [type:id => timestamp] */
    private array $processedIds = [];

    public function __construct(
        private readonly RpcClient $client,
        private readonly LoggerInterface $logger
    ) {}

    public function dispatch(array $message): void
    {
        $body = $message['body'];
        $decTime = $message['dec_time'] ?? 0.0;
        $offset = 0;

        if (strlen($body) < 4) return;
        $constructor = Deserializer::peekInt32($body, $offset);

        switch ($constructor) {
            case Constructors::MSG_CONTAINER:
                $this->handleContainer($body, $offset, $decTime);
                break;

            case Constructors::GZIP_PACKED:
                $unpacked = Deserializer::deserializeGzipPacked($body, $offset);
                $this->dispatch([
                    'msg_id' => $message['msg_id'],
                    'seq_no' => $message['seq_no'],
                    'body' => $unpacked,
                    'dec_time' => $decTime
                ]);
                break;

            case Constructors::RPC_RESULT:
                $this->handleRpcResult($body, $offset, $decTime);
                break;

            case Constructors::RPC_ERROR:
                // Глобальная ошибка RPC (вне контейнера)
                $this->logger->warning("Global RPC Error received", [
                    'channel' => LogChannel::RPC,
                    'msg_id' => $message['msg_id']
                ]);
                break;

            case Constructors::PONG:
                Deserializer::int32($body, $offset);
                $msgId = Deserializer::int64($body, $offset);
                $pingId = Deserializer::int64($body, $offset);

                $this->client->fulfillRequest($msgId, Serializer::int32(0x997275b5), $decTime);

//                $this->logger->debug("Pong received", [
//                    'channel' => LogChannel::SERVICE,
//                    'ping_id' => $pingId
//                ]);
                break;

            case Constructors::NEW_SESSION_CREATED:
                $sessionData = Deserializer::deserializeNewSessionCreated($body, $offset);
                $newSalt = $sessionData['server_salt'];

                $this->logger->info("New session created", [
                    'channel' => LogChannel::SESSION,
                    'salt' => $newSalt,
                    'unique_id' => $sessionData['unique_id']
                ]);

                $state = $this->client->getConnection()->getSessionState();
                $this->client->updateSalt($newSalt);
                // $state->resetSeqNo(); // Обычно сбрасывать не нужно, сессия новая
                $state->setInitialized(false);
                break;

            case Constructors::BAD_SERVER_SALT: // 0xedab447b
                $saltData = Deserializer::deserializeBadServerSalt($body, $offset);
                $newSalt = $saltData['new_server_salt'];
                $badMsgId = $saltData['bad_msg_id'];

                $this->logger->notice("Bad Server Salt", [
                    'channel' => LogChannel::SESSION,
                    'bad_msg' => $badMsgId,
                    'new_salt' => $newSalt
                ]);

                $this->client->updateSalt($newSalt);
                $this->client->getConnection()->getSessionState()->updateTimeOffset($message['msg_id']);

                $this->logger->info("Time synchronized with server", [
                    'channel' => LogChannel::SESSION
                ]);

                $this->client->getConnection()->getSessionState()->setInitialized(false);
                $this->client->resendRequest($badMsgId);
                break;

            case 0xa7eff811: // bad_msg_notification
                Deserializer::int32($body, $offset); // consume constructor
                $badMsgId = Deserializer::int64($body, $offset);
                $badSeqNo = Deserializer::int32($body, $offset);
                $errorCode = Deserializer::int32($body, $offset);

                $this->logger->error("Bad Msg Notification", [
                    'channel' => LogChannel::SESSION,
                    'bad_msg' => $badMsgId,
                    'code' => $errorCode
                ]);

                if (in_array($errorCode, [16, 17, 18, 19, 20, 32, 33, 34, 35, 48, 64], true)) {
                    // Ошибки синхронизации времени или сессии
                    if (in_array($errorCode, [16, 17, 32, 33], true)) {
                        $this->logger->info("Auto-recovering: Syncing time/seqno and resending...", [
                            'channel' => LogChannel::SESSION,
                            'msg_id' => $badMsgId
                        ]);
                        $this->client->getConnection()->getSessionState()->updateTimeOffset($message['msg_id']);
                        $this->client->resendRequest($badMsgId);
                    } else {
                        // Критические ошибки сессии (нужен ресет)
                        $ex = new ResendRequiredException("Critical session error (code {$errorCode})");
                        $this->client->failRequest($badMsgId, $ex);
                    }
                } else {
                    $ex = new TransportException("Fatal bad_msg_notification (code {$errorCode})", $errorCode);
                    $this->client->failRequest($badMsgId, $ex);
                }
                break;

            case Constructors::MSGS_ACK:
                // Просто подтверждение, что сервер получил наши сообщения
                break;

            case Constructors::MSG_DETAILED_INFO:
                $info = Deserializer::deserializeMsgDetailedInfo($body, $offset);
                $sMsgId = '...' . substr((string)$info['msg_id'], -6);
                $sAnsId = '...' . substr((string)$info['answer_msg_id'], -6);
                $this->logger->debug("Msg Detailed Info", [
                    'channel' => LogChannel::SERVICE,
                    'msg' => $sMsgId,
                    'ans' => $sAnsId
                ]);
                // Обычно здесь нужно добавить msg_id в очередь на ack
                $this->client->getConnection()->getSessionState()->addToAckQueue($message['msg_id']);
                break;

            case Constructors::MSG_NEW_DETAILED_INFO:
                $info = Deserializer::deserializeMsgNewDetailedInfo($body, $offset);
                $sAnsId = '...' . substr((string)$info['answer_msg_id'], -6);
                $this->logger->debug("Msg New Detailed Info", [
                    'channel' => LogChannel::SERVICE,
                    'ans' => $sAnsId
                ]);
                $this->client->getConnection()->getSessionState()->addToAckQueue($message['msg_id']);
                break;

            case 0x74ae4240: // updates
                $updates = Updates::deserialize($body, $offset);
                $this->processUpdates($updates, $decTime);
                break;

            case 0x725b04c3: // updatesCombined
                $updates = UpdatesCombined::deserialize($body, $offset);
                $this->processUpdates($updates, $decTime);
                break;

            case 0x78d4dec1: // updateShort
                $update = UpdateShort::deserialize($body, $offset);
                $this->triggerUpdate($update->update, $decTime);
                break;

            case 0x313bc7f8: // updateShortMessage
                $update = UpdateShortMessage::deserialize($body, $offset);
                $this->triggerUpdate($update, $decTime);
                break;

            case 0x4d6deea5: // updateShortChatMessage
                $update = UpdateShortChatMessage::deserialize($body, $offset);
                $this->triggerUpdate($update, $decTime);
                break;

            case 0x9015e101: // updateShortSentMessage
                $update = UpdateShortSentMessage::deserialize($body, $offset);
                $this->triggerUpdate($update, $decTime);
                break;

            case 0xe317af7e: // updatesTooLong
                $this->logger->notice("Updates too long (Gap)", [
                    'channel' => LogChannel::SESSION
                ]);
                $update = UpdatesTooLong::deserialize($body, $offset);
                $this->triggerUpdate($update, $decTime);
                break;

            default:
                $this->logger->warning("Unknown message received", [
                    'channel' => LogChannel::NET,
                    'constructor' => '0x' . dechex($constructor)
                ]);
                break;
        }
    }

    private function processUpdates(object $updatesObject, float $decTime): void
    {
        if (isset($updatesObject->users)) {
            $this->client->getPeerManager()->collect($updatesObject->users);
        }
        if (isset($updatesObject->chats)) {
            $this->client->getPeerManager()->collect($updatesObject->chats);
        }

        if (isset($updatesObject->updates) && is_array($updatesObject->updates)) {
            foreach ($updatesObject->updates as $update) {
                $this->triggerUpdate($update, $decTime);
            }
        }
    }

    /**
     * Передает обновление в пользовательский коллбэк с дедупликацией.
     */
    private function triggerUpdate(object $update, float $decTime = 0.0): void
    {
        $updateId = null;
        $peerInfo = '';
        $text = null;

        if (isset($update->message)) {
            if (is_string($update->message)) {
                // Это UpdateShortMessage
                $text = $update->message;
            } elseif (is_object($update->message)) {
                // Это UpdateNewMessage / UpdateNewChannelMessage
                $msg = $update->message;
                if (isset($msg->id)) $updateId = $msg->id;
                if (isset($msg->message)) $text = $msg->message;
                if (isset($msg->peerId)) $peerInfo = $this->extractPeerString($msg);
            }
        }
        // Обработка UpdateShortChatMessage и подобных
        elseif (isset($update->update) && is_object($update->update)) {
            if (isset($update->update->id)) $updateId = $update->update->id;
            if (isset($update->update->message)) $text = $update->update->message;
        }

        $type = $this->getShortClassName($update);

        // 2. Дедупликация (FIX: Учитываем PTS)
        if ($updateId !== null) {
            $dedupKey = "{$type}:{$updateId}";

            // --- ДОБАВЛЕНО: Если есть PTS, добавляем его в ключ ---
            // Это делает каждое редактирование уникальным событием
            if (isset($update->pts)) {
                $dedupKey .= ":{$update->pts}";
            }
            // ------------------------------------------------------

            if (isset($this->processedIds[$dedupKey])) {
                $this->logger->debug("Ignored duplicate", [
                    'channel' => LogChannel::UPDATE,
                    'type' => $type,
                    'id' => $updateId,
                    'pts' => $update->pts ?? null // Логируем PTS дубля для проверки
                ]);
                return;
            }

            $this->processedIds[$dedupKey] = time();

            if (count($this->processedIds) > 2000) {
                $this->processedIds = array_slice($this->processedIds, -1000, null, true);
            }
        }

        // 3. Логирование
        $logContext = [
            'channel' => LogChannel::UPDATE,
            'type' => $type
        ];
        if ($updateId) $logContext['id'] = $updateId;
        if (isset($update->pts)) $logContext['pts'] = $update->pts; // PTS
        if (isset($update->ptsCount)) $logContext['pts_cnt'] = $update->ptsCount;
        if (isset($update->seq)) $logContext['seq'] = $update->seq;
        if ($peerInfo) $logContext['peer'] = $peerInfo;
        if ($decTime > 0) $logContext['t_dec'] = number_format($decTime, 2, '.', '') . 'ms';

        if (is_string($text)) {
            $cleanText = str_replace(["\r", "\n"], ' ', $text);
            $logContext['text'] = mb_substr($cleanText, 0, 40) . (mb_strlen($cleanText) > 40 ? '...' : '');
        }

        $this->logger->info("↓ Update", $logContext);

        $this->client->onUpdateReceived($update);
    }

    /**
     * Вспомогательный метод для получения ID чата/юзера из сообщения
     */
    private function extractPeerString(object $message): string
    {
        // Примерная логика (зависит от ваших TL-классов)
        if (isset($message->peerId)) {
            $p = $message->peerId;
            // Если это объект PeerUser / PeerChat / PeerChannel
            if (isset($p->userId)) return "user:{$p->userId}";
            if (isset($p->chatId)) return "chat:{$p->chatId}";
            if (isset($p->channelId)) return "chan:{$p->channelId}";
        }
        // Fallback для user_id в UpdateShortMessage
        if (isset($message->userId)) return "user:{$message->userId}";
        if (isset($message->chatId)) return "chat:{$message->chatId}";

        return '';
    }

    private function handleContainer(string $body, int $offset, float $decTime): void
    {
        Deserializer::int32($body, $offset); // skip const
        $count = Deserializer::int32($body, $offset);

        for ($i = 0; $i < $count; $i++) {
            $msgId = Deserializer::int64($body, $offset);
            $seqNo = Deserializer::int32($body, $offset);
            $length = Deserializer::int32($body, $offset);
            $innerBody = substr($body, $offset, $length);
            $offset += $length;

            $this->dispatch([
                'msg_id' => $msgId,
                'seq_no' => $seqNo,
                'body' => $innerBody,
                'dec_time' => $decTime
            ]);
        }
    }

    private function handleRpcResult(string $body, int $offset, float $decTime): void
    {
        Deserializer::int32($body, $offset); // skip const
        $reqMsgId = Deserializer::int64($body, $offset);

        $innerConstructor = Deserializer::peekInt32($body, $offset);

        if ($innerConstructor === Constructors::RPC_ERROR) {
            Deserializer::int32($body, $offset);
            $code = Deserializer::int32($body, $offset);
            $message = Deserializer::bytes($body, $offset);

            $this->client->failRequest($reqMsgId, new RpcErrorException($code, $message));
            return;
        }

        if ($innerConstructor === Constructors::GZIP_PACKED) {
            $unpacked = Deserializer::deserializeGzipPacked($body, $offset);
            $this->client->fulfillRequest($reqMsgId, $unpacked, $decTime);
            return;
        }

        $resultBody = substr($body, $offset);
        $this->client->fulfillRequest($reqMsgId, $resultBody, $decTime);
    }

    /**
     * Быстрое получение имени класса без Reflection.
     */
    private function getShortClassName(object $obj): string
    {
        $name = get_class($obj);
        return substr($name, strrpos($name, '\\') + 1);
    }
}