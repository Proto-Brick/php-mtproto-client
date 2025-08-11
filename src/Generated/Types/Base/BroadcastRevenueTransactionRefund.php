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
    public const CONSTRUCTOR_ID = 0x42d30d2e;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->provider);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $amount = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $provider = Deserializer::bytes($stream);
        return new self(
            $amount,
            $date,
            $provider
        );
    }
}