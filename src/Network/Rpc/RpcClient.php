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
use Revolt\EventLoop;

use function Amp\async;

class RpcClient
{
    /**
     * Structure:
     * [
     *    msg_id => [
     *       'deferred' => DeferredFuture,
     *       'request'  => RpcRequest,
     *       'payload'  => string,
     *       'trace'    => RequestTrace,
     *       'timer_id' => string|null,
     *       'timeout_sec' => int
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

    public function send(RpcRequest $request, int $timeout = 30, bool $isContentRelated = true): Future
    {
        $deferred = new DeferredFuture();
        $trace = new RequestTrace();

        $t0 = hrtime(true);
        $payload = $request->serialize();
        $trace->ser = (hrtime(true) - $t0) / 1e+6;
        $trace->reqBytes = strlen($payload);

        $this->sendPayload($payload, $request, $deferred, $trace, $timeout, $isContentRelated);

        return $deferred->getFuture();
    }

    private function sendPayload(
        string $payload,
        RpcRequest $request,
        DeferredFuture $deferred,
        RequestTrace $trace,
        int $timeout,
        bool $isContextRelated,
    ): void {
        $trace->attempts++;

        //temp logging
        $methodName = $request->getMethodName();
        $isService = str_contains($methodName, 'ping') || str_contains($methodName, 'ack');
        $channel = $isService ? LogChannel::SERVICE : LogChannel::RPC;

        $this->logger->debug("→ (sending) " . $methodName, [
            'channel' => $channel,
            'out' => strlen($payload) . 'B',
            'dc' => $this->connection->dcId,
        ]);

        async(function () use ($payload, $request, $deferred, $trace, $timeout, $isContextRelated) {
            try {
                /** @var array{0: int, 1: float} $result */
                $result = $this->connection->sendPacket($payload, $isContextRelated)->await();
                [$msgId, $seqNo, $encTime] = $result;

                $shortMsg = '...' . substr((string)$msgId, -6);

                $trace->enc = $encTime;

                $timerId = EventLoop::delay($timeout, function () use ($msgId, $timeout) {
                    $this->failRequest($msgId, new \RuntimeException("Request timed out after {$timeout}ms (GC)"));
                });

                $this->pendingRequests[$msgId] = [
                    'deferred' => $deferred,
                    'request' => $request,
                    'payload' => $payload,
                    'trace' => $trace,
                    'timer_id' => $timerId,
                    'timeout_sec' => $timeout
                ];

                $methodName = $request->getMethodName();

                $isService = str_contains($methodName, 'ping') || str_contains($methodName, 'ack');
                $channel = $isService ? LogChannel::SERVICE : LogChannel::RPC;

                $this->logger->debug("→ " . $methodName, [
                    'channel' => $channel,
                    'msg' => $shortMsg,
                    'seq' => $seqNo,
                    'out' => strlen($payload) . 'B',
                    'dc' => $this->connection->dcId,
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

    public function resendAll(): void
    {
        if (empty($this->pendingRequests)) {
            return;
        }

        $this->logger->info("Resending pending requests", [
            'channel' => LogChannel::RPC,
            'count' => count($this->pendingRequests),
            'type' => 'RECONNECT_RETRY'
        ]);

        $toResend = $this->pendingRequests;
        $this->pendingRequests = [];

        foreach ($toResend as $oldMsgId => $entry) {
            if (isset($entry['timer_id'])) {
                EventLoop::cancel($entry['timer_id']);
            }

            $this->sendPayload(
                $entry['payload'],
                $entry['request'],
                $entry['deferred'],
                $entry['trace'],
                $entry['timeout_sec'] ?? 30,
                true
            );
        }
    }

    public function resendRequest(int $badMsgId): void
    {
        if (!isset($this->pendingRequests[$badMsgId])) {
            return;
        }
        $entry = $this->pendingRequests[$badMsgId];
        unset($this->pendingRequests[$badMsgId]);

        if (isset($entry['timer_id'])) {
            EventLoop::cancel($entry['timer_id']);
        }

        $this->sendPayload(
            $entry['payload'],
            $entry['request'],
            $entry['deferred'],
            $entry['trace'],
            $entry['timeout_sec'] ?? 30,
            true
        );
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
        unset($this->pendingRequests[$reqMsgId]);

        if (isset($entry['timer_id'])) {
            EventLoop::cancel($entry['timer_id']);
        }

        /** @var DeferredFuture $deferred */
        $deferred = $entry['deferred'];
        /** @var RpcRequest $request */
        $request = $entry['request'];
        /** @var RequestTrace $trace */
        $trace = $entry['trace'];

        try {
            $trace->resBytes = strlen($rawBody);
            $trace->dec = $decTime;

            $tDeserStart = hrtime(true);
            $result = $this->deserializeResponse($request, $rawBody);
            $trace->des = (hrtime(true) - $tDeserStart) / 1e+6;

            $stats = $trace->finish();
            $totalCpu = $stats['ser'] + $stats['enc'] + $stats['dec'] + $stats['des'];
            $shortMsg = '...' . substr((string)$reqMsgId, -6);

            $methodName = $request->getMethodName();
            $isService = str_contains($methodName, 'ping') || str_contains($methodName, 'ack');
            $logChannel = $isService ? LogChannel::SERVICE : LogChannel::RPC;

            $this->logger->debug("← " . $methodName, [
                'channel' => $logChannel,
                'msg' => $shortMsg,
                'net' => $stats['net'] . 'ms',
                'cpu' => number_format($totalCpu, 2, '.', '') . 'ms',
                'in' => $stats['res_size'],
                'res' => $this->summarizeResult($result)
            ]);

            if (!$deferred->isComplete()) {
                $deferred->complete($result);
            }
        } catch (\Throwable $e) {
            $this->logger->error("RPC Failed: {$request->getMethodName()}", [
                'channel' => LogChannel::RPC,
                'exception' => $e
            ]);
            if (!$deferred->isComplete()) {
                $deferred->error($e);
            }
        }
    }

    public function failRequest(int $reqMsgId, \Throwable $error): void
    {
        if (!isset($this->pendingRequests[$reqMsgId])) {
            $this->logger->debug("Attempted to fail unknown request $reqMsgId", ['channel' => LogChannel::RPC]);
            return;
        }

        $entry = $this->pendingRequests[$reqMsgId];

        // --- ДОБАВЛЯЕМ ЛОГИРОВАНИЕ ---
        /** @var RpcRequest $request */
        $request = $entry['request'];

        $this->logger->warning("✕ Request Failed: " . $request->getMethodName(), [
            'channel' => LogChannel::RPC,
            'msg_id' => $reqMsgId,
            'error' => $error->getMessage(),
            // 'trace' => $error->getTraceAsString() // Раскомментировать для глубокой отладки
        ]);
        // -----------------------------

        unset($this->pendingRequests[$reqMsgId]);

        if (isset($entry['timer_id'])) {
            EventLoop::cancel($entry['timer_id']);
        }

        if (!$entry['deferred']->isComplete()) {
            $entry['deferred']->error($error);
        }
    }

    public function abortAll(\Throwable $reason): void
    {
        foreach ($this->pendingRequests as $entry) {
            if (isset($entry['timer_id'])) {
                EventLoop::cancel($entry['timer_id']);
            }
            if (!$entry['deferred']->isComplete()) {
                $entry['deferred']->error($reason);
            }
        }
        $this->pendingRequests = [];
    }

    public function updateSalt(int $newSalt): void
    {
        $this->connection->updateSalt($newSalt);
    }

    public function onUpdateReceived(object $update): void
    {
        $this->connection->onUpdateReceived($update);
    }

    public function getPeerManager(): PeerManager
    {
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

    private function summarizeResult(mixed $result): string
    {
        if (is_array($result)) {
            $count = count($result);
            $type = isset($result[0]) ? $this->shortenClass($result[0]) : 'mixed';
            return "Vector<{$type}>[$count]";
        }
        if (is_object($result)) {
            $name = $this->shortenClass($result);
            if (isset($result->count)) {
                return "{$name} (n={$result->count})";
            }
            if (isset($result->updates) && is_array($result->updates)) {
                return "{$name} [" . count($result->updates) . "]";
            }
            return $name;
        }
        if (is_bool($result)) {
            return $result ? 'True' : 'False';
        }
        return (string)$result;
    }

    private function shortenClass(object $obj): string
    {
        $parts = explode('\\', get_class($obj));
        return end($parts);
    }
}