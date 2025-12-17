<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionSuggestProfilePhoto
 */
final class MessageActionSuggestProfilePhoto extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x57de635e;
    
    public string $predicate = 'messageActionSuggestProfilePhoto';
    
    /**
     * @param AbstractPhoto $photo
     */
    public function __construct(
        public readonly AbstractPhoto $photo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->photo->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $photo = AbstractPhoto::deserialize($__payload, $__offset);

        return new self(
            $photo
        );
    }
}