<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/privacyKeyPhoneCall
 */
final class PrivacyKeyPhoneCall extends AbstractPrivacyKey
{
    public const CONSTRUCTOR_ID = 0x3d662b7b;
    
    public string $_ = 'privacyKeyPhoneCall';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.

        return new self();
    }
}