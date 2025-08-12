<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Contracts\TlObjectInterface;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/InlineQueryPeerType
 */
enum InlineQueryPeerType: int implements TlObjectInterface
{
    case InlineQueryPeerTypeSameBotPM = 0x3081ed9d;
    case InlineQueryPeerTypePM = 0x833c0fac;
    case InlineQueryPeerTypeChat = 0xd766c50a;
    case InlineQueryPeerTypeMegagroup = 0x5ec4be43;
    case InlineQueryPeerTypeBroadcast = 0x6334ee9a;
    case InlineQueryPeerTypeBotPM = 0xe3b2d0c;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (\ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::InlineQueryPeerTypeSameBotPM => 'inlineQueryPeerTypeSameBotPM',
            self::InlineQueryPeerTypePM => 'inlineQueryPeerTypePM',
            self::InlineQueryPeerTypeChat => 'inlineQueryPeerTypeChat',
            self::InlineQueryPeerTypeMegagroup => 'inlineQueryPeerTypeMegagroup',
            self::InlineQueryPeerTypeBroadcast => 'inlineQueryPeerTypeBroadcast',
            self::InlineQueryPeerTypeBotPM => 'inlineQueryPeerTypeBotPM',
        };
    }
}