<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/help.country
 */
final class Country extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc3878e23;
    
    public string $predicate = 'help.country';
    
    /**
     * @param string $iso2
     * @param string $defaultName
     * @param list<CountryCode> $countryCodes
     * @param true|null $hidden
     * @param string|null $name
     */
    public function __construct(
        public readonly string $iso2,
        public readonly string $defaultName,
        public readonly array $countryCodes,
        public readonly ?true $hidden = null,
        public readonly ?string $name = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hidden) {
            $flags |= (1 << 0);
        }
        if ($this->name !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->iso2);
        $buffer .= Serializer::bytes($this->defaultName);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->name);
        }
        $buffer .= Serializer::vectorOfObjects($this->countryCodes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $hidden = (($flags & (1 << 0)) !== 0) ? true : null;
        $iso2 = Deserializer::bytes($__payload, $__offset);
        $defaultName = Deserializer::bytes($__payload, $__offset);
        $name = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $countryCodes = Deserializer::vectorOfObjects($__payload, $__offset, [CountryCode::class, 'deserialize']);

        return new self(
            $iso2,
            $defaultName,
            $countryCodes,
            $hidden,
            $name
        );
    }
}