<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGift
 */
final class InputInvoiceStarGift extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xe8625e92;
    
    public string $predicate = 'inputInvoiceStarGift';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $giftId
     * @param true|null $hideName
     * @param true|null $includeUpgrade
     * @param TextWithEntities|null $message
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $giftId,
        public readonly ?true $hideName = null,
        public readonly ?true $includeUpgrade = null,
        public readonly ?TextWithEntities $message = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hideName) $flags |= (1 << 0);
        if ($this->includeUpgrade) $flags |= (1 << 2);
        if ($this->message !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int64($this->giftId);
        if ($flags & (1 << 1)) {
            $buffer .= $this->message->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $hideName = ($flags & (1 << 0)) ? true : null;
        $includeUpgrade = ($flags & (1 << 2)) ? true : null;
        $peer = AbstractInputPeer::deserialize($stream);
        $giftId = Deserializer::int64($stream);
        $message = ($flags & (1 << 1)) ? TextWithEntities::deserialize($stream) : null;

        return new self(
            $peer,
            $giftId,
            $hideName,
            $includeUpgrade,
            $message
        );
    }
}