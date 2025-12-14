<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/passwordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow
 */
final class PasswordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow extends AbstractPasswordKdfAlgo
{
    public const CONSTRUCTOR_ID = 0x3a912d4a;
    
    public string $predicate = 'passwordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow';
    
    /**
     * @param string $salt1
     * @param string $salt2
     * @param int $g
     * @param string $p
     */
    public function __construct(
        public readonly string $salt1,
        public readonly string $salt2,
        public readonly int $g,
        public readonly string $p
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->salt1);
        $buffer .= Serializer::bytes($this->salt2);
        $buffer .= Serializer::int32($this->g);
        $buffer .= Serializer::bytes($this->p);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $salt1 = Deserializer::bytes($stream);
        $salt2 = Deserializer::bytes($stream);
        $g = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $p = Deserializer::bytes($stream);

        return new self(
            $salt1,
            $salt2,
            $g,
            $p
        );
    }
}