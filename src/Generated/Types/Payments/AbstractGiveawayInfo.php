<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/payments.GiveawayInfo
 */
abstract class AbstractGiveawayInfo extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0x4367daa0 => GiveawayInfo::deserialize($stream),
            0xe175e66f => GiveawayInfoResults::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type payments.GiveawayInfo. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}