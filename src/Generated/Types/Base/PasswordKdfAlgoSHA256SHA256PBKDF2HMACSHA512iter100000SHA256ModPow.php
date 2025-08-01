<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/passwordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow
 */
final class PasswordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow extends AbstractPasswordKdfAlgo
{
    public const CONSTRUCTOR_ID = 982592842;
    
    public string $_ = 'passwordKdfAlgoSHA256SHA256PBKDF2HMACSHA512iter100000SHA256ModPow';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->salt1);
        $buffer .= $serializer->bytes($this->salt2);
        $buffer .= $serializer->int32($this->g);
        $buffer .= $serializer->bytes($this->p);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $salt1 = $deserializer->bytes($stream);
        $salt2 = $deserializer->bytes($stream);
        $g = $deserializer->int32($stream);
        $p = $deserializer->bytes($stream);
            return new self(
            $salt1,
            $salt2,
            $g,
            $p
        );
    }
}