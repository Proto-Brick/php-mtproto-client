<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emailVerifyPurposeLoginSetup
 */
final class EmailVerifyPurposeLoginSetup extends AbstractEmailVerifyPurpose
{
    public const CONSTRUCTOR_ID = 0x4345be73;
    
    public string $_ = 'emailVerifyPurposeLoginSetup';
    
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $phoneNumber = Deserializer::bytes($stream);
        $phoneCodeHash = Deserializer::bytes($stream);
        return new self(
            $phoneNumber,
            $phoneCodeHash
        );
    }
}