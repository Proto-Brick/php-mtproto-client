<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\UniqueStarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getUniqueStarGift
 */
final class GetUniqueStarGiftRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa1974d72;
    
    public string $predicate = 'payments.getUniqueStarGift';
    
    public function getMethodName(): string
    {
        return 'payments.getUniqueStarGift';
    }
    
    public function getResponseClass(): string
    {
        return UniqueStarGift::class;
    }
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}