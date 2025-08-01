<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsSubscriptionPricing
 */
final class StarsSubscriptionPricing extends AbstractStarsSubscriptionPricing
{
    public const CONSTRUCTOR_ID = 88173912;
    
    public string $_ = 'starsSubscriptionPricing';
    
    /**
     * @param int $period
     * @param int $amount
     */
    public function __construct(
        public readonly int $period,
        public readonly int $amount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->period);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $period = $deserializer->int32($stream);
        $amount = $deserializer->int64($stream);
            return new self(
            $period,
            $amount
        );
    }
}