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
    public const CONSTRUCTOR_ID = 1128644211;
    
    public string $_ = 'emailVerifyPurposeLoginSetup';
    
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->phoneCodeHash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $phoneNumber = $deserializer->bytes($stream);
        $phoneCodeHash = $deserializer->bytes($stream);
            return new self(
            $phoneNumber,
            $phoneCodeHash
        );
    }
}