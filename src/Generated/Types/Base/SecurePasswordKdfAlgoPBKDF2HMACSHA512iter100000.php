<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/securePasswordKdfAlgoPBKDF2HMACSHA512iter100000
 */
final class SecurePasswordKdfAlgoPBKDF2HMACSHA512iter100000 extends AbstractSecurePasswordKdfAlgo
{
    public const CONSTRUCTOR_ID = 0xbbf2dda0;
    
    public string $_ = 'securePasswordKdfAlgoPBKDF2HMACSHA512iter100000';
    
    /**
     * @param string $salt
     */
    public function __construct(
        public readonly string $salt
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->salt);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $salt = Deserializer::bytes($stream);
        return new self(
            $salt
        );
    }
}