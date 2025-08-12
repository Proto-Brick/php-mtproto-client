<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stats;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBroadcastRevenueTransaction;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stats.broadcastRevenueTransactions
 */
final class BroadcastRevenueTransactions extends TlObject
{
    public const CONSTRUCTOR_ID = 0x87158466;
    
    public string $predicate = 'stats.broadcastRevenueTransactions';
    
    /**
     * @param int $count
     * @param list<AbstractBroadcastRevenueTransaction> $transactions
     */
    public function __construct(
        public readonly int $count,
        public readonly array $transactions
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->transactions);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($stream);
        $transactions = Deserializer::vectorOfObjects($stream, [AbstractBroadcastRevenueTransaction::class, 'deserialize']);

        return new self(
            $count,
            $transactions
        );
    }
}