<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChannel
 */
final class UpdateChannel extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x635b4c09;
    
    public string $predicate = 'updateChannel';
    
    /**
     * @param int $channelId
     */
    public function __construct(
        public readonly int $channelId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $channelId = Deserializer::int64($__payload, $__offset);

        return new self(
            $channelId
        );
    }
}