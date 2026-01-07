<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/ProfileTab
 */
enum ProfileTab: int implements TlObjectInterface
{
    case ProfileTabPosts = 0xb98cd696;
    case ProfileTabGifts = 0x4d4bd46a;
    case ProfileTabMedia = 0x72c64955;
    case ProfileTabFiles = 0xab339c00;
    case ProfileTabMusic = 0x9f27d26e;
    case ProfileTabVoice = 0xe477092e;
    case ProfileTabLinks = 0xd3656499;
    case ProfileTabGifs = 0xa2c0f695;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string $__payload, int &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
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
            self::ProfileTabPosts => 'profileTabPosts',
            self::ProfileTabGifts => 'profileTabGifts',
            self::ProfileTabMedia => 'profileTabMedia',
            self::ProfileTabFiles => 'profileTabFiles',
            self::ProfileTabMusic => 'profileTabMusic',
            self::ProfileTabVoice => 'profileTabVoice',
            self::ProfileTabLinks => 'profileTabLinks',
            self::ProfileTabGifs => 'profileTabGifs',
        };
    }
}