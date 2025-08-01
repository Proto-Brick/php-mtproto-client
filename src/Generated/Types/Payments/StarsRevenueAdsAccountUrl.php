<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starsRevenueAdsAccountUrl
 */
final class StarsRevenueAdsAccountUrl extends AbstractStarsRevenueAdsAccountUrl
{
    public const CONSTRUCTOR_ID = 961445665;
    
    public string $_ = 'payments.starsRevenueAdsAccountUrl';
    
    /**
     * @param string $url
     */
    public function __construct(
        public readonly string $url
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
            return new self(
            $url
        );
    }
}