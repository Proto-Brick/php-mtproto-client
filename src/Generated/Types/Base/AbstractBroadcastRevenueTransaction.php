<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/BroadcastRevenueTransaction
 */
abstract class AbstractBroadcastRevenueTransaction extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            BroadcastRevenueTransactionProceeds::CONSTRUCTOR_ID => BroadcastRevenueTransactionProceeds::deserialize($deserializer, $stream),
            BroadcastRevenueTransactionWithdrawal::CONSTRUCTOR_ID => BroadcastRevenueTransactionWithdrawal::deserialize($deserializer, $stream),
            BroadcastRevenueTransactionRefund::CONSTRUCTOR_ID => BroadcastRevenueTransactionRefund::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type BroadcastRevenueTransaction: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}