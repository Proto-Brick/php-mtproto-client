<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Contracts\TlObjectInterface;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use RuntimeException;
use ValueError;

/**
 * @see https://core.telegram.org/type/auth.CodeType
 */
enum CodeType: int implements TlObjectInterface
{
    case CodeTypeSms = 0x72a3158c;
    case CodeTypeCall = 0x741cd3e3;
    case CodeTypeFlashCall = 0x226ccefb;
    case CodeTypeMissedCall = 0xd61ad6ee;
    case CodeTypeFragmentSms = 0x6ed998c;

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
            self::CodeTypeSms => 'auth.codeTypeSms',
            self::CodeTypeCall => 'auth.codeTypeCall',
            self::CodeTypeFlashCall => 'auth.codeTypeFlashCall',
            self::CodeTypeMissedCall => 'auth.codeTypeMissedCall',
            self::CodeTypeFragmentSms => 'auth.codeTypeFragmentSms',
        };
    }
}