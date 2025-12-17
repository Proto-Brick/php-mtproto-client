<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.countriesList
 */
final class CountriesList extends AbstractCountriesList
{
    public const CONSTRUCTOR_ID = 0x87d0759e;
    
    public string $predicate = 'help.countriesList';
    
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $countries = Deserializer::vectorOfObjects($__payload, $__offset, [Country::class, 'deserialize']);
        $hash = Deserializer::int32($__payload, $__offset);

        return new self(
            $countries,
            $hash
        );
    }
}