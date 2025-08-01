<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.countryCode
 */
final class CountryCode extends AbstractCountryCode
{
    public const CONSTRUCTOR_ID = 1107543535;
    
    public string $_ = 'help.countryCode';
    
    /**
     * @param string $countryCode
     * @param list<string>|null $prefixes
     * @param list<string>|null $patterns
     */
    public function __construct(
        public readonly string $countryCode,
        public readonly ?array $prefixes = null,
        public readonly ?array $patterns = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->prefixes !== null) $flags |= (1 << 0);
        if ($this->patterns !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->countryCode);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfStrings($this->prefixes);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfStrings($this->patterns);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $countryCode = $deserializer->bytes($stream);
        $prefixes = ($flags & (1 << 0)) ? $deserializer->vectorOfStrings($stream) : null;
        $patterns = ($flags & (1 << 1)) ? $deserializer->vectorOfStrings($stream) : null;
            return new self(
            $countryCode,
            $prefixes,
            $patterns
        );
    }
}