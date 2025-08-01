<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/broadcastRevenueTransactionRefund
 */
final class BroadcastRevenueTransactionRefund extends AbstractBroadcastRevenueTransaction
{
    public const CONSTRUCTOR_ID = 1121127726;
    
    public string $_ = 'broadcastRevenueTransactionRefund';
    
    /**
     * @param int $amount
     * @param int $date
     * @param string $provider
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $date,
        public readonly string $provider
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->provider);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $amount = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $provider = $deserializer->bytes($stream);
            return new self(
            $amount,
            $date,
            $provider
        );
    }
}