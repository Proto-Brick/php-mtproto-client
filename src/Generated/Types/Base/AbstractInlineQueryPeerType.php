<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InlineQueryPeerType
 */
abstract class AbstractInlineQueryPeerType extends TlObject
{
    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = $deserializer->peekInt32($stream);
        
        $result = match ($constructorId) {
            InlineQueryPeerTypeSameBotPM::CONSTRUCTOR_ID => InlineQueryPeerTypeSameBotPM::deserialize($deserializer, $stream),
            InlineQueryPeerTypePM::CONSTRUCTOR_ID => InlineQueryPeerTypePM::deserialize($deserializer, $stream),
            InlineQueryPeerTypeChat::CONSTRUCTOR_ID => InlineQueryPeerTypeChat::deserialize($deserializer, $stream),
            InlineQueryPeerTypeMegagroup::CONSTRUCTOR_ID => InlineQueryPeerTypeMegagroup::deserialize($deserializer, $stream),
            InlineQueryPeerTypeBroadcast::CONSTRUCTOR_ID => InlineQueryPeerTypeBroadcast::deserialize($deserializer, $stream),
            InlineQueryPeerTypeBotPM::CONSTRUCTOR_ID => InlineQueryPeerTypeBotPM::deserialize($deserializer, $stream),
            default => throw new \Exception('Unknown constructor ID for type InlineQueryPeerType: ' . dechex($constructorId)),
        };

        /** @var static $result */
        return $result;
    }
}