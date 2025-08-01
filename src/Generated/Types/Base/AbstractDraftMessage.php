<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/DraftMessage
 */
abstract class AbstractDraftMessage extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            DraftMessageEmpty::CONSTRUCTOR_ID => DraftMessageEmpty::deserialize($deserializer, $stream),
            DraftMessage::CONSTRUCTOR_ID => DraftMessage::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type DraftMessage: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}