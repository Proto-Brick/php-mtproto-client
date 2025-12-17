<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestPeer
 */
final class KeyboardButtonRequestPeer extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0x53d7bfd8;
    
    public string $predicate = 'keyboardButtonRequestPeer';
    
    /**
     * @param string $text
     * @param int $buttonId
     * @param AbstractRequestPeerType $peerType
     * @param int $maxQuantity
     */
    public function __construct(
        public readonly string $text,
        public readonly int $buttonId,
        public readonly AbstractRequestPeerType $peerType,
        public readonly int $maxQuantity
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= $this->peerType->serialize();
        $buffer .= Serializer::int32($this->maxQuantity);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $text = Deserializer::bytes($__payload, $__offset);
        $buttonId = Deserializer::int32($__payload, $__offset);
        $peerType = AbstractRequestPeerType::deserialize($__payload, $__offset);
        $maxQuantity = Deserializer::int32($__payload, $__offset);

        return new self(
            $text,
            $buttonId,
            $peerType,
            $maxQuantity
        );
    }
}