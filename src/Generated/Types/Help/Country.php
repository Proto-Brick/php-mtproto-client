<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.country
 */
final class Country extends AbstractCountry
{
    public const CONSTRUCTOR_ID = 3280440867;
    
    public string $_ = 'help.country';
    
    /**
     * @param string $iso2
     * @param string $defaultName
     * @param list<AbstractCountryCode> $countryCodes
     * @param bool|null $hidden
     * @param string|null $name
     */
    public function __construct(
        public readonly string $iso2,
        public readonly string $defaultName,
        public readonly array $countryCodes,
        public readonly ?bool $hidden = null,
        public readonly ?string $name = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hidden) $flags |= (1 << 0);
        if ($this->name !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->iso2);
        $buffer .= $serializer->bytes($this->defaultName);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->name);
        }
        $buffer .= $serializer->vectorOfObjects($this->countryCodes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hidden = ($flags & (1 << 0)) ? true : null;
        $iso2 = $deserializer->bytes($stream);
        $defaultName = $deserializer->bytes($stream);
        $name = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $countryCodes = $deserializer->vectorOfObjects($stream, [AbstractCountryCode::class, 'deserialize']);
            return new self(
            $iso2,
            $defaultName,
            $countryCodes,
            $hidden,
            $name
        );
    }
}