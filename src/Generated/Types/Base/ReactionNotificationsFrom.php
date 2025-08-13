<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/ReactionNotificationsFrom
 */
enum ReactionNotificationsFrom: int implements TlObjectInterface
{
    case ReactionNotificationsFromContacts = 0xbac3a61a;
    case ReactionNotificationsFromAll = 0x4b9e22a0;

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
            self::ReactionNotificationsFromContacts => 'reactionNotificationsFromContacts',
            self::ReactionNotificationsFromAll => 'reactionNotificationsFromAll',
        };
    }
}