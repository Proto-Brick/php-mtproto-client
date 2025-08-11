<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonRequestPeer
 */
final class InputKeyboardButtonRequestPeer extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xc9662d05;
    
    public string $_ = 'inputKeyboardButtonRequestPeer';
    
    /**
     * @param string $text
     * @param int $buttonId
     * @param AbstractRequestPeerType $peerType
     * @param int $maxQuantity
     * @param bool|null $nameRequested
     * @param bool|null $usernameRequested
     * @param bool|null $photoRequested
     */
    public function __construct(
        public readonly string $text,
        public readonly int $buttonId,
        public readonly AbstractRequestPeerType $peerType,
        public readonly int $maxQuantity,
        public readonly ?bool $nameRequested = null,
        public readonly ?bool $usernameRequested = null,
        public readonly ?bool $photoRequested = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nameRequested) $flags |= (1 << 0);
        if ($this->usernameRequested) $flags |= (1 << 1);
        if ($this->photoRequested) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= $this->peerType->serialize();
        $buffer .= Serializer::int32($this->maxQuantity);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $nameRequested = ($flags & (1 << 0)) ? true : null;
        $usernameRequested = ($flags & (1 << 1)) ? true : null;
        $photoRequested = ($flags & (1 << 2)) ? true : null;
        $text = Deserializer::bytes($stream);
        $buttonId = Deserializer::int32($stream);
        $peerType = AbstractRequestPeerType::deserialize($stream);
        $maxQuantity = Deserializer::int32($stream);
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