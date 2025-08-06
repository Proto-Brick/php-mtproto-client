<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\DataJSON;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.passportConfig
 */
final class PassportConfig extends AbstractPassportConfig
{
    public const CONSTRUCTOR_ID = 0xa098d6af;
    
    public string $_ = 'help.passportConfig';
    
    /**
     * @param int $hash
     * @param array $countriesLangs
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $countriesLangs
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->bytes(json_encode($this->countriesLangs, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $countriesLangs = $deserializer->deserializeDataJSON($stream);
        return new self(
            $hash,
            $countriesLangs
        );
    }
}