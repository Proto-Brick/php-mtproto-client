<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.broadcastRevenueWithdrawalUrl
 */
final class BroadcastRevenueWithdrawalUrl extends AbstractBroadcastRevenueWithdrawalUrl
{
    public const CONSTRUCTOR_ID = 3966080823;
    
    public string $_ = 'stats.broadcastRevenueWithdrawalUrl';
    
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