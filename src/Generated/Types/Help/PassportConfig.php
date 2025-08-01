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
    public const CONSTRUCTOR_ID = 2694370991;
    
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
        $buffer .= (new DataJSON(json_encode($this->countriesLangs)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $countriesLangs = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $hash,
            $countriesLangs
        );
    }
}