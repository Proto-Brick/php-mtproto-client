<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\MTProto;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * ping_delay_disconnect#f3427b8c ping_id:long disconnect_delay:int = Pong;
 */
class PingDelayDisconnectRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf3427b8c;

    public function __construct(
        public int $pingId,
        public int $disconnectDelay
    ) {}

    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID)
            . Serializer::int64($this->pingId)
            . Serializer::int32($this->disconnectDelay);
    }

    public function getMethodName(): string
    {
        return 'ping_delay_disconnect';
    }

    public function getResponseClass(): string
    {
        return 'bool';
    }
}