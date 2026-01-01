<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\MTProto;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * ping#7abe77ec ping_id:long = Pong;
 */
class PingRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7abe77ec;

    public function __construct(
        public int $pingId
    ) {}

    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID)
            . Serializer::int64($this->pingId);
    }

    public function getMethodName(): string
    {
        return 'ping';
    }

    public function getResponseClass(): string
    {
        return Pong::class;
    }
}