<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/MessagePeerVote
 */
abstract class AbstractMessagePeerVote extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            MessagePeerVote::CONSTRUCTOR_ID => MessagePeerVote::deserialize($deserializer, $stream),
            MessagePeerVoteInputOption::CONSTRUCTOR_ID => MessagePeerVoteInputOption::deserialize($deserializer, $stream),
            MessagePeerVoteMultiple::CONSTRUCTOR_ID => MessagePeerVoteMultiple::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type MessagePeerVote: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}