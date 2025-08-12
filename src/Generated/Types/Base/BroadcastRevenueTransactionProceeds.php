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
    
    public string $predicate = 'broadcastRevenueTransactionProceeds';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->fromDate);
        $buffer .= Serializer::int32($this->toDate);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $amount = Deserializer::int64($stream);
        $fromDate = Deserializer::int32($stream);
        $toDate = Deserializer::int32($stream);

        return new self(
            $amount,
            $fromDate,
            $toDate
        );
    }
}