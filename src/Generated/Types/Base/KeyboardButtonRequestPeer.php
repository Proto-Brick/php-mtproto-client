<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/keyboardButtonRequestPeer
 */
final class KeyboardButtonRequestPeer extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 1406648280;
    
    public string $_ = 'keyboardButtonRequestPeer';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->int32($this->buttonId);
        $buffer .= $this->peerType->serialize($serializer);
        $buffer .= $serializer->int32($this->maxQuantity);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $buttonId = $deserializer->int32($stream);
        $peerType = AbstractRequestPeerType::deserialize($deserializer, $stream);
        $maxQuantity = $deserializer->int32($stream);
            return new self(
            $text,
            $buttonId,
            $peerType,
            $maxQuantity
        );
    }
}