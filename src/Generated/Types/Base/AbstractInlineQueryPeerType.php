<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\TlObject;
/**
 * @see https://core.telegram.org/type/InlineQueryPeerType
 */
abstract class AbstractInlineQueryPeerType extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            InlineQueryPeerTypeSameBotPM::CONSTRUCTOR_ID => InlineQueryPeerTypeSameBotPM::deserialize($stream),
            InlineQueryPeerTypePM::CONSTRUCTOR_ID => InlineQueryPeerTypePM::deserialize($stream),
            InlineQueryPeerTypeChat::CONSTRUCTOR_ID => InlineQueryPeerTypeChat::deserialize($stream),
            InlineQueryPeerTypeMegagroup::CONSTRUCTOR_ID => InlineQueryPeerTypeMegagroup::deserialize($stream),
            InlineQueryPeerTypeBroadcast::CONSTRUCTOR_ID => InlineQueryPeerTypeBroadcast::deserialize($stream),
            InlineQueryPeerTypeBotPM::CONSTRUCTOR_ID => InlineQueryPeerTypeBotPM::deserialize($stream),
            default => throw new \Exception(sprintf('Unknown constructor ID for type InlineQueryPeerType. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}