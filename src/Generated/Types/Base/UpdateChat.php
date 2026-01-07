<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateChat
 */
final class UpdateChat extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf89a6a4e;
    
    public string $predicate = 'updateChat';
    
    /**
     * @param int $chatId
     */
    public function __construct(
        public readonly int $chatId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $chatId = Deserializer::int64($__payload, $__offset);

        return new self(
            $chatId
        );
    }
}