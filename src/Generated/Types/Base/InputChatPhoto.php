<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputChatPhoto
 */
final class InputChatPhoto extends AbstractInputChatPhoto
{
    public const CONSTRUCTOR_ID = 0x8953ad37;
    
    public string $predicate = 'inputChatPhoto';
    
    /**
     * @param AbstractInputPhoto $id
     */
    public function __construct(
        public readonly AbstractInputPhoto $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = AbstractInputPhoto::deserialize($__payload, $__offset);

        return new self(
            $id
        );
    }
}