<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network\Rpc;

use Amp\DeferredFuture;
use Amp\Future;
use ProtoBrick\MTProtoClient\Diagnostics\RequestTrace;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\Network\DataCenterConnection;
use ProtoBrick\MTProtoClient\Peer\PeerManager;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;

use Psr\Log\LoggerInterface;

use function Amp\async;

class RpcClient
{
    /**
     * Структура:
     * [
     *    msg_id => [
     *       'deferred' => DeferredFuture,
     *       'request'  => RpcRequest,
     *       'payload'  => string,
     *       'trace'    => RequestTrace
     *    ]
     * ]
     */
    private array $pendingRequests = [];

    private ResponseDispatcher $dispatcher;

    public function __construct(
        private readonly DataCenterConnection $connection,
        private readonly LoggerInterface $logger
    ) {
        $this->dispatcher = new ResponseDispatcher($this, $this->logger);
    }

    public function getConnection(): DataCenterConnection
    {
        return $this->connection;
    }

    public function send(RpcRequest $request, int $timeout = 30): Future
    {
        $deferred = new DeferredFuture();
        $trace = new RequestTrace();


        $t0 = hrtime(true);
        $payload = $request->serialize();
        $trace->ser = (hrtime(true) - $t0) / 1e+6;
        $trace->reqBytes = strlen($payload);

        // Отправляем (или ставим в очередь, если реконнект)
        $this->sendPayload($payload, $request, $deferred, $trace);

        return $deferred->getFuture();
    }

    /**
     * Внутренний метод отправки сырых байтов.
     * Используется и для первичной отправки, и для ресенда.
     */
    private function sendPayload(
        string $payload,
        RpcRequest $request,
        DeferredFuture $deferred,
        RequestTrace $trace
    ): void {
        $trace->attempts++;

        async(function () use ($payload, $request, $deferred, $trace) {
            try {
                /** @var array{0: int, 1: float} $result */
                $result = $this->connection->sendPacket($payload, true)->await();
                [$msgId, $encTime] = $result;

                $trace->enc = $encTime;

                $this->pendingRequests[$msgId] = [
                    'deferred' => $deferred,
                    'request' => $request,
                    'payload' => $payload,
                    'trace' => $trace
                ];

                $shortMsg = '...' . substr((string)$msgId, -6); // Берем последние 6 цифр

                $methodName = $request->getMethodName();

                $isService = str_contains($methodName, 'ping') || str_contains($methodName, 'ack');
                $channel = $isService ? LogChannel::SERVICE : LogChannel::RPC;

                $this->logger->debug("→ " . $methodName, [
                    'channel' => $channel,
                    'msg'     => $shortMsg,
                    'dc'      => $this->connection->dcId,
                    // 'size' уберем, если args есть, или оставим
//                    'args'    => $this->extractParams($request)
                ]);
            } catch (\Throwable $e) {
                $this->logger->error("Transport write failed", [
                    'channel' => LogChannel::RPC,
                    'method' => $request->getMethodName(),
                    'exception' => $e
                ]);
            }
        })->ignore();
    }

    /**
     * Переотправляет ВСЕ висящие запросы.
     * Вызывается после успешного реконнекта.
     */
    public function resendAll(): void
    {
        if (empty($this->pendingRequests)) {
            return;
        }

        $this->logger->info("Resending pending requests", [
            'channel' => LogChannel::RPC,
            'count' => count($this->pendingRequests),
            'type'  => 'RECONNECT_RETRY'
        ]);

        $toResend = $this->pendingRequests;
        $this->pendingRequests = [];

        foreach ($toResend as $oldMsgId => $entry) {
            // Используем тот же deferred, чтобы пользовательский await продолжил ждать
            $this->sendPayload($entry['payload'], $entry['request'], $entry['deferred'], $entry['trace']);
        }
    }

    /**
     * Переотправка одного конкретного запроса (для bad_server_salt)
     */
    public function resendRequest(int $badMsgId): void
    {
        if (!isset($this->pendingRequests[$badMsgId])) {
            return;
        }

        $entry = $this->pendingRequests[$badMsgId];
        unset($this->pendingRequests[$badMsgId]);

        // Переотправляем
        $this->sendPayload($entry['payload'], $entry['request'], $entry['deferred'], $entry['trace']);
    }

    public function handleMessage(array $message): void
    {
        $this->dispatcher->dispatch($message);
    }

    public function fulfillRequest(int $reqMsgId, string $rawBody, float $decTime = 0.0): void
    {
        if (!isset($this->pendingRequests[$reqMsgId])) {
            return;
        }

        $entry = $this->pendingRequests[$reqMsgId];
        /** @var DeferredFuture $deferred */
        $deferred = $entry['deferred'];
        /** @var RpcRequest $request */
        $request = $entry['request'];
        /** @var RequestTrace $trace */
        $trace = $entry['trace'];

        unset($this->pendingRequests[$reqMsgId]);

        try {
            $trace->resBytes = strlen($rawBody);
            $trace->dec = $decTime;

            $tDeserStart = hrtime(true);
            $result = $this->deserializeResponse($request, $rawBody);
            $trace->des = (hrtime(true) - $tDeserStart) / 1e+6;

            $stats = $trace->finish();

            // Считаем общее CPU время для компактного отображения
            $totalCpu = $stats['ser'] + $stats['enc'] + $stats['dec'] + $stats['des'];

            $shortMsg = '...' . substr((string)$reqMsgId, -6);

            $this->logger->debug("← " . $request->getMethodName(), [
                'channel' => LogChannel::RPC,
                'msg'     => $shortMsg, // Короткий ID
                'net'     => $stats['net'] . 'ms',
                'cpu'     => number_format($totalCpu, 2, '.', '') . 'ms',
                'in'      => $stats['res_size'],
                'res'     => $this->summarizeResult($result)
            ]);

            $deferred->complete($result);
        } catch (\Throwable $e) {
            $this->logger->error("RPC Failed: {$request->getMethodName()}", [
                'channel' => LogChannel::RPC,
                'exception' => $e
            ]);
            $deferred->error($e);
        }
    }

    public function failRequest(int $reqMsgId, \Throwable $error): void
    {
        if (!isset($this->pendingRequests[$reqMsgId])) {
            return;
        }

        $deferred = $this->pendingRequests[$reqMsgId]['deferred'];
        unset($this->pendingRequests[$reqMsgId]);

        $deferred->error($error);
    }

    public function abortAll(\Throwable $reason): void
    {
        foreach ($this->pendingRequests as $entry) {
            $entry['deferred']->error($reason);
        }
        $this->pendingRequests = [];
    }

    public function updateSalt(int $newSalt): void
    {
        $this->connection->updateSalt($newSalt);
    }

    public function onUpdateReceived(object $update): void
    {
        // Пробрасываем в соединение
        $this->connection->onUpdateReceived($update);
    }

    // Также добавьте геттер для PeerManager, если его нет, чтобы Dispatcher мог сохранять юзеров
    public function getPeerManager(): PeerManager
    {
        // PeerManager живет в Client, но у нас тут только Connection.
        // Connection может иметь ссылку на PeerManager (переданную из Factory).
        return $this->connection->getPeerManager();
    }

    private function deserializeResponse(RpcRequest $request, string $body): mixed
    {
        $responseClassOrType = $request->getResponseClass();
        $offset = 0;

        if (str_starts_with($responseClassOrType, 'vector<')) {
            $innerType = substr($responseClassOrType, 7, -1);
            if (class_exists($innerType)) {
                return Deserializer::vectorOfObjects($body, $offset, [$innerType, 'deserialize']);
            }
            return match ($innerType) {
                'int' => Deserializer::vectorOfInts($body, $offset),
                'long' => Deserializer::vectorOfLongs($body, $offset),
                'string', 'bytes' => Deserializer::vectorOfStrings($body, $offset),
                default => throw new \RuntimeException("Unsupported vector type: $innerType"),
            };
        }

        if (class_exists($responseClassOrType)) {
            return $responseClassOrType::deserialize($body, $offset);
        }

        return match ($responseClassOrType) {
            'bool' => Deserializer::bool($body, $offset),
            'int' => Deserializer::int32($body, $offset),
            'long' => Deserializer::int64($body, $offset),
            'string' => Deserializer::bytes($body, $offset),
            'true' => true,
            default => throw new \RuntimeException("Unsupported response type: '$responseClassOrType'"),
        };
    }

    /**
     * Формирует краткую сводку ответа.
     */
    private function summarizeResult(mixed $result): string
    {
        if (is_array($result)) {
            $count = count($result);
            $type = isset($result[0]) ? $this->shortenClass($result[0]) : 'mixed';
            return "Vector<{$type}>[$count]";
        }
        if (is_object($result)) {
            $name = $this->shortenClass($result);
            // Если это Slice (список с общим кол-вом), покажем count
            if (isset($result->count)) return "{$name} (n={$result->count})";
            // Если это Updates, покажем кол-во событий
            if (isset($result->updates) && is_array($result->updates)) {
                return "{$name} [" . count($result->updates) . "]";
            }
            return $name;
        }
        if (is_bool($result)) return $result ? 'True' : 'False';
        return (string)$result;
    }

    private function shortenClass(object $obj): string
    {
        $parts = explode('\\', get_class($obj));
        return end($parts);
    }
}