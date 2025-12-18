<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionChatEditPhoto
 */
final class MessageActionChatEditPhoto extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x7fcb13a8;
    
    public string $predicate = 'messageActionChatEditPhoto';
    
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
        $__offset += 4; // Constructor ID
        $photo = AbstractPhoto::deserialize($__payload, $__offset);

        return new self(
            $photo
        );
    }
}