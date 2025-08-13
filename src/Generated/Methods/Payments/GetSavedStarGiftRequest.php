<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SavedStarGifts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getSavedStarGift
 */
final class GetSavedStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb455a106;
    
    public string $predicate = 'payments.getSavedStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.getSavedStarGift';
    }
    
    public function getResponseClass(): string
    {
        return SavedStarGifts::class;
    }
    /**
     * @param list<AbstractInputSavedStarGift> $stargift
     */
    public function __construct(
        public readonly array $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->stargift);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}