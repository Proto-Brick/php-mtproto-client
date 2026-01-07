<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSuggestedPostSuccess
 */
final class MessageActionSuggestedPostSuccess extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x95ddcf69;
    
    public string $predicate = 'messageActionSuggestedPostSuccess';
    
    /**
     * @param AbstractStarsAmount $price
     */
    public function __construct(
        public readonly AbstractStarsAmount $price
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->price->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $price = AbstractStarsAmount::deserialize($__payload, $__offset);

        return new self(
            $price
        );
    }
}