<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\TL\MTProto;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;

/**
 * pong#347773c5 msg_id:long ping_id:long = Pong;
 */
class Pong extends TlObject
{
    public const CONSTRUCTOR_ID = 0x347773c5;

    public function __construct(
        public int $msgId,
        public int $pingId
    ) {}

    public function serialize(): string
    {
        return ''; // Сериализация для Pong клиентом не используется
    }

    public static function deserialize(string $__payload, int &$__offset): static
    {
        $id = Deserializer::int32($__payload, $__offset);

        $msgId = Deserializer::int64($__payload, $__offset);
        $pingId = Deserializer::int64($__payload, $__offset);

        return new self($msgId, $pingId);
    }
}