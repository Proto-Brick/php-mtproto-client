<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackDifference
 */
final class LangPackDifference extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf385c1f6;
    
    public string $_ = 'langPackDifference';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->int32($this->fromVersion);
        $buffer .= $serializer->int32($this->version);
        $buffer .= $serializer->vectorOfObjects($this->strings);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $langCode = $deserializer->bytes($stream);
        $fromVersion = $deserializer->int32($stream);
        $version = $deserializer->int32($stream);
        $strings = $deserializer->vectorOfObjects($stream, [AbstractLangPackString::class, 'deserialize']);
        return new self(
            $langCode,
            $fromVersion,
            $version,
            $strings
        );
    }
}