<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.upgradeStarGift
 */
final class UpgradeStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xaed6e4f5;
    
    public string $predicate = 'payments.upgradeStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.upgradeStarGift';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
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
        throw new \LogicException('Request objects are not deserializable');
    }
}