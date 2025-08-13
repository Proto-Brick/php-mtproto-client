<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageEntityPre
 */
final class MessageEntityPre extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0x73924be0;
    
    public string $predicate = 'messageEntityPre';
    
    /**
     * @param int $offset
     * @param int $length
     * @param string $language
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly string $language
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->length);
        $buffer .= Serializer::bytes($this->language);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $offset = Deserializer::int32($stream);
        $length = Deserializer::int32($stream);
        $language = Deserializer::bytes($stream);

        return new self(
            $offset,
            $length,
            $language
        );
    }
}