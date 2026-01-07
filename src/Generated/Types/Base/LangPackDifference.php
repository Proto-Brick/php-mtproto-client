<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/langPackDifference
 */
final class LangPackDifference extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf385c1f6;
    
    public string $predicate = 'langPackDifference';
    
    /**
     * @param string $langCode
     * @param int $fromVersion
     * @param int $version
     * @param list<AbstractLangPackString> $strings
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $fromVersion,
        public readonly int $version,
        public readonly array $strings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->fromVersion);
        $buffer .= Serializer::int32($this->version);
        $buffer .= Serializer::vectorOfObjects($this->strings);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $langCode = Deserializer::bytes($__payload, $__offset);
        $fromVersion = Deserializer::int32($__payload, $__offset);
        $version = Deserializer::int32($__payload, $__offset);
        $strings = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractLangPackString::class, 'deserialize']);

        return new self(
            $langCode,
            $fromVersion,
            $version,
            $strings
        );
    }
}