<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/messages.SponsoredMessages
 */
abstract class AbstractSponsoredMessages extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            SponsoredMessages::CONSTRUCTOR_ID => SponsoredMessages::deserialize($deserializer, $stream),
            SponsoredMessagesEmpty::CONSTRUCTOR_ID => SponsoredMessagesEmpty::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type messages.SponsoredMessages: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}