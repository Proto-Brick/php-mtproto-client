<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessagePeerVote
 */
abstract class AbstractMessagePeerVote extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xb6cc2d5c => MessagePeerVote::deserialize($stream),
            0x74cda504 => MessagePeerVoteInputOption::deserialize($stream),
            0x4628f6e6 => MessagePeerVoteMultiple::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type MessagePeerVote. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}