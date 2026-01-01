<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Network;

use Amp\Future;
use Closure;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use Psr\Log\LoggerInterface;

class ConnectionManager
{
    /** @var array<int, DataCenterConnection> */
    private array $connections = [];

    private ?Closure $updateHandler;

    public function __construct(
        private readonly ConnectionFactory $factory,
        private readonly int $mainDcId,
        private readonly LoggerInterface $logger
    ) {}

    /**
     * Gets or creates a connection to the specified Data Center.
     */
    public function getConnection(int $dcId): DataCenterConnection
    {
        if (!isset($this->connections[$dcId])) {

            $this->logger->debug("Initializing new connection entry for DC{$dcId}", [
                'channel' => LogChannel::NET
            ]);

            $conn = $this->factory->create($dcId);
            if ($this->updateHandler) {
                $conn->setOnUpdateHandler($this->updateHandler);
            }
            $this->connections[$dcId] = $conn;
        }
        return $this->connections[$dcId];
    }

    public function getMainConnection(): DataCenterConnection
    {
        return $this->getConnection($this->mainDcId);
    }

    /**
     * Sends an RPC request to the appropriate DC.
     * If no DC is specified, sends to the Main DC.
     */
    public function call(RpcRequest $request, ?int $dcId = null): Future
    {
        $targetDc = $dcId ?? $this->mainDcId;
        return $this->getConnection($targetDc)->call($request);
    }

    public function setOnUpdateHandler(callable $handler): void
    {
        $this->updateHandler = $handler;
        // Если уже есть соединения, подписываем их тоже
        foreach ($this->connections as $conn) {
            $conn->setOnUpdateHandler($handler);
        }
    }

    public function close(): void
    {
        foreach ($this->connections as $dcId => $connection) {
            $this->logger->info("Terminating connection to DC{$dcId}", [
                'channel' => LogChannel::NET
            ]);
            $connection->close();
        }
        $this->connections = [];
    }
}