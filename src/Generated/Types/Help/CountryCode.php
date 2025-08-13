<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/help.countryCode
 */
final class CountryCode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4203c5ef;
    
    public string $predicate = 'help.countryCode';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->prefixes !== null) {
            $flags |= (1 << 0);
        }
        if ($this->patterns !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->countryCode);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfStrings($this->prefixes);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfStrings($this->patterns);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $countryCode = Deserializer::bytes($stream);
        $prefixes = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfStrings($stream) : null;
        $patterns = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfStrings($stream) : null;

        return new self(
            $countryCode,
            $prefixes,
            $patterns
        );
    }
}