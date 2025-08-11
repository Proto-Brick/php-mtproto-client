<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.country
 */
final class Country extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc3878e23;
    
    public string $_ = 'help.country';
    
    /**
     * @param string $iso2
     * @param string $defaultName
     * @param list<CountryCode> $countryCodes
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hidden) $flags |= (1 << 0);
        if ($this->name !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->iso2);
        $buffer .= Serializer::bytes($this->defaultName);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->name);
        }
        $buffer .= Serializer::vectorOfObjects($this->countryCodes);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $hidden = ($flags & (1 << 0)) ? true : null;
        $iso2 = Deserializer::bytes($stream);
        $defaultName = Deserializer::bytes($stream);
        $name = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $countryCodes = Deserializer::vectorOfObjects($stream, [CountryCode::class, 'deserialize']);
        return new self(
            $iso2,
            $defaultName,
            $countryCodes,
            $hidden,
            $name
        );
    }
}