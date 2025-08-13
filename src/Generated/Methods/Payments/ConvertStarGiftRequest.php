<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputSavedStarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.convertStarGift
 */
final class ConvertStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x74bf076b;
    
    public string $predicate = 'payments.convertStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.convertStarGift';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputSavedStarGift $stargift
     */
    public function __construct(
        public readonly AbstractInputSavedStarGift $stargift
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stargift->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}