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
    
    public string $predicate = 'help.passportConfig';
    
    /**
     * @param int $hash
     * @param array $countriesLangs
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $countriesLangs
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::bytes(json_encode($this->countriesLangs, JSON_FORCE_OBJECT));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int32($stream);
        $countriesLangs = Deserializer::deserializeDataJSON($stream);

        return new self(
            $hash,
            $countriesLangs
        );
    }
}