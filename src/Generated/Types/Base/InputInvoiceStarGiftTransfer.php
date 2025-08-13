<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftTransfer
 */
final class InputInvoiceStarGiftTransfer extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x4a5f5bd9;
    
    public string $predicate = 'inputInvoiceStarGiftTransfer';
    
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param AbstractInputPeer $toId
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly AbstractInputPeer $toId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();
        $buffer .= $this->toId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $stargift = AbstractInputSavedStarGift::deserialize($stream);
        $toId = AbstractInputPeer::deserialize($stream);

        return new self(
            $stargift,
            $toId
        );
    }
}