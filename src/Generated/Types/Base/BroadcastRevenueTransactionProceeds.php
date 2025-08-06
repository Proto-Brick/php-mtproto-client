<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/broadcastRevenueTransactionProceeds
 */
final class BroadcastRevenueTransactionProceeds extends AbstractBroadcastRevenueTransaction
{
    public const CONSTRUCTOR_ID = 0x557e2cc4;
    
    public string $_ = 'broadcastRevenueTransactionProceeds';
    
    /**
     * @param int $amount
     * @param int $fromDate
     * @param int $toDate
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $fromDate,
        public readonly int $toDate
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int32($this->fromDate);
        $buffer .= $serializer->int32($this->toDate);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $amount = $deserializer->int64($stream);
        $fromDate = $deserializer->int32($stream);
        $toDate = $deserializer->int32($stream);
        return new self(
            $amount,
            $fromDate,
            $toDate
        );
    }
}