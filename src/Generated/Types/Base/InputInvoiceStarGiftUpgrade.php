<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceStarGiftUpgrade
 */
final class InputInvoiceStarGiftUpgrade extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0x4d818d5d;
    
    public string $predicate = 'inputInvoiceStarGiftUpgrade';
    
    /**
     * @param AbstractInputSavedStarGift $stargift
     * @param true|null $keepOriginalDetails
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift,
        public readonly ?true $keepOriginalDetails = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->keepOriginalDetails) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->stargift->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $keepOriginalDetails = ($flags & (1 << 0)) ? true : null;
        $stargift = AbstractInputSavedStarGift::deserialize($stream);

        return new self(
            $stargift,
            $keepOriginalDetails
        );
    }
}