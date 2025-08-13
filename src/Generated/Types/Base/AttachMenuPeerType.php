<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/AttachMenuPeerType
 */
enum AttachMenuPeerType: int implements TlObjectInterface
{
    case AttachMenuPeerTypeSameBotPM = 0x7d6be90e;
    case AttachMenuPeerTypeBotPM = 0xc32bfa1a;
    case AttachMenuPeerTypePM = 0xf146d31f;
    case AttachMenuPeerTypeChat = 0x509113f;
    case AttachMenuPeerTypeBroadcast = 0x7bfbdefc;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (ValueError $e) {
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
            self::AttachMenuPeerTypeSameBotPM => 'attachMenuPeerTypeSameBotPM',
            self::AttachMenuPeerTypeBotPM => 'attachMenuPeerTypeBotPM',
            self::AttachMenuPeerTypePM => 'attachMenuPeerTypePM',
            self::AttachMenuPeerTypeChat => 'attachMenuPeerTypeChat',
            self::AttachMenuPeerTypeBroadcast => 'attachMenuPeerTypeBroadcast',
        };
    }
}