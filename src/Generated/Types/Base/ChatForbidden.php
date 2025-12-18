<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatForbidden
 */
final class ChatForbidden extends AbstractChat
{
    public const CONSTRUCTOR_ID = 0x6592a1a7;
    
    public string $predicate = 'chatForbidden';
    
    /**
     * @param int $id
     * @param string $title
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $title = Deserializer::bytes($__payload, $__offset);

        return new self(
            $id,
            $title
        );
    }
}