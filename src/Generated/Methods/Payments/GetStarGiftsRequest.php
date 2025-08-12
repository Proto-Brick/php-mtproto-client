<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarGifts;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarGifts
 */
final class GetStarGiftsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc4563590;
    
    public string $predicate = 'payments.getStarGifts';
    
    public function getMethodName(): string
    {
        return 'payments.getStarGifts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarGifts::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}