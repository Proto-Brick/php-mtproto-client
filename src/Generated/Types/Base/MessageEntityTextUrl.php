<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityTextUrl
 */
final class MessageEntityTextUrl extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0x76a6d327;
    
    public string $predicate = 'messageEntityTextUrl';
    
    /**
     * @param int $offset
     * @param int $length
     * @param string $url
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $offset = Deserializer::int32($__payload, $__offset);
        $length = Deserializer::int32($__payload, $__offset);
        $url = Deserializer::bytes($__payload, $__offset);

        return new self(
            $offset,
            $length,
            $url
        );
    }
}