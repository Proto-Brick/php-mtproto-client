<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network;

use ProtoBrick\MTProtoClient\Auth\Storage\AuthKeyStorage;
use ProtoBrick\MTProtoClient\Auth\AuthKeyCreator;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\Network\MTProto\SessionState;
use ProtoBrick\MTProtoClient\Peer\PeerManager;
use ProtoBrick\MTProtoClient\Session\Storage\SessionStorage;
use ProtoBrick\MTProtoClient\Settings;
use ProtoBrick\MTProtoClient\Transport\TcpTransport;
use ProtoBrick\MTProtoClient\Transport\Security\Obfuscator;
use Psr\Log\LoggerInterface;

class ConnectionFactory
{
    public function __construct(
        private Settings $settings,
        private AuthKeyStorage $keyStorage,
        private SessionStorage $sessionStorage,
        private Obfuscator $obfuscator,
        private PeerManager $peerManager,
        private readonly LoggerInterface $logger
    ) {}

    public function create(int $dcId): DataCenterConnection
    {
        // Предполагаем, что AuthKeyStorage обновлен для поддержки dcId.
        // Если ваш старый storage не поддерживает аргументы, пока используйте ->get()
        $authKey = $this->keyStorage->get();
        // В будущем: $this->keyStorage->get($dcId);

        $sessionState = new SessionState();

        if (!$authKey) {
            // 1. Создаем временный транспорт для handshake
            // Важно: здесь мы используем настройки из Settings, но для Multi-DC
            // в будущем нужно будет подставлять IP конкретного дата-центра.
            $transport = new TcpTransport($this->settings, $this->obfuscator);

            // TcpTransport::connect() возвращает Future, поэтому нужен await()
            $transport->connect()->await();

            // 2. Генерируем ключ
            $creator = new AuthKeyCreator($transport, $this->logger);
            $result = $creator->create(); // Возвращает AuthResult

            $authKey = $result->authKey;

            // 3. Сохраняем ключ
            $this->keyStorage->set($authKey);
            // В будущем: ->set($authKey, $dcId);

            // 4. Инициализируем сессию полученными данными (соль, время)
            $sessionState->setServerSalt($result->initialSalt);
            $sessionState->setTimeOffset($result->timeOffset);
            $this->sessionStorage->setFor($authKey->id, $sessionState->toArray());

            // 5. Закрываем временный транспорт
            $transport->close();

            $this->logger->debug("AuthKey saved to storage.", ['channel' => LogChannel::AUTH]);
        } else {
            // Ключ уже был на диске
            $savedData = $this->sessionStorage->getFor($authKey->id);
            if ($savedData) {
                $sessionState->fromArray($savedData);
                $this->logger->debug("Session state loaded from disk for DC $dcId", [
                    'channel' => LogChannel::SESSION
                ]);
            } else {
                $this->logger->warning("No session state found for existing key on DC $dcId, starting fresh", [
                    'channel' => LogChannel::SESSION
                ]);
            }
        }

        // 6. Создаем постоянное соединение для RPC
        $transport = new TcpTransport($this->settings, $this->obfuscator);

        return new DataCenterConnection(
            $dcId,
            $this->settings,
            $transport,
            $authKey,
            $sessionState,
            $this->peerManager,
            $this->logger
        );
    }
}