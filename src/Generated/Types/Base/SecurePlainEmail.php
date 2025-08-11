<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/securePlainEmail
 */
final class SecurePlainEmail extends AbstractSecurePlainData
{
    public const CONSTRUCTOR_ID = 0x21ec5a5f;
    
    public string $_ = 'securePlainEmail';
    
    /**
     * @param string $email
     */
    public function __construct(
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->email);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $email = Deserializer::bytes($stream);
        return new self(
            $email
        );
    }
}