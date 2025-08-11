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
    public const CONSTRUCTOR_ID = 0x87d0759e;
    
    public string $_ = 'help.countriesList';
    
    /**
     * @param list<Country> $countries
     * @param int $hash
     */
    public function __construct(
        public readonly array $countries,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->countries);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $countries = Deserializer::vectorOfObjects($stream, [Country::class, 'deserialize']);
        $hash = Deserializer::int32($stream);
        return new self(
            $countries,
            $hash
        );
    }
}