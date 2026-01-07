<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonRequestPeer
 */
final class InputKeyboardButtonRequestPeer extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xc9662d05;
    
    public string $predicate = 'inputKeyboardButtonRequestPeer';
    
    /**
     * @param string $text
     * @param int $buttonId
     * @param AbstractRequestPeerType $peerType
     * @param int $maxQuantity
     * @param true|null $nameRequested
     * @param true|null $usernameRequested
     * @param true|null $photoRequested
     */
    public function __construct(
        public readonly string $text,
        public readonly int $buttonId,
        public readonly AbstractRequestPeerType $peerType,
        public readonly int $maxQuantity,
        public readonly ?true $nameRequested = null,
        public readonly ?true $usernameRequested = null,
        public readonly ?true $photoRequested = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameRequested) {
            $flags |= (1 << 0);
        }
        if ($this->usernameRequested) {
            $flags |= (1 << 1);
        }
        if ($this->photoRequested) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= $this->peerType->serialize();
        $buffer .= Serializer::int32($this->maxQuantity);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $nameRequested = (($flags & (1 << 0)) !== 0) ? true : null;
        $usernameRequested = (($flags & (1 << 1)) !== 0) ? true : null;
        $photoRequested = (($flags & (1 << 2)) !== 0) ? true : null;
        $text = Deserializer::bytes($__payload, $__offset);
        $buttonId = Deserializer::int32($__payload, $__offset);
        $peerType = AbstractRequestPeerType::deserialize($__payload, $__offset);
        $maxQuantity = Deserializer::int32($__payload, $__offset);

        return new self(
            $text,
            $buttonId,
            $peerType,
            $maxQuantity,
            $nameRequested,
            $usernameRequested,
            $photoRequested
        );
    }
}