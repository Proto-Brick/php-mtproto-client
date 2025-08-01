<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.countriesList
 */
final class CountriesList extends AbstractCountriesList
{
    public const CONSTRUCTOR_ID = 2278585758;
    
    public string $_ = 'help.countriesList';
    
    /**
     * @param list<AbstractCountry> $countries
     * @param int $hash
     */
    public function __construct(
        public readonly array $countries,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->countries);
        $buffer .= $serializer->int32($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $countries = $deserializer->vectorOfObjects($stream, [AbstractCountry::class, 'deserialize']);
        $hash = $deserializer->int32($stream);
            return new self(
            $countries,
            $hash
        );
    }
}