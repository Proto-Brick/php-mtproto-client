<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackLanguage
 */
final class LangPackLanguage extends TlObject
{
    public const CONSTRUCTOR_ID = 0xeeca5ce3;
    
    public string $_ = 'langPackLanguage';
    
    /**
     * @param string $name
     * @param string $nativeName
     * @param string $langCode
     * @param string $pluralCode
     * @param int $stringsCount
     * @param int $translatedCount
     * @param string $translationsUrl
     * @param bool|null $official
     * @param bool|null $rtl
     * @param bool|null $beta
     * @param string|null $baseLangCode
     */
    public function __construct(
        public readonly string $name,
        public readonly string $nativeName,
        public readonly string $langCode,
        public readonly string $pluralCode,
        public readonly int $stringsCount,
        public readonly int $translatedCount,
        public readonly string $translationsUrl,
        public readonly ?bool $official = null,
        public readonly ?bool $rtl = null,
        public readonly ?bool $beta = null,
        public readonly ?string $baseLangCode = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->official) $flags |= (1 << 0);
        if ($this->rtl) $flags |= (1 << 2);
        if ($this->beta) $flags |= (1 << 3);
        if ($this->baseLangCode !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::bytes($this->nativeName);
        $buffer .= Serializer::bytes($this->langCode);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->baseLangCode);
        }
        $buffer .= Serializer::bytes($this->pluralCode);
        $buffer .= Serializer::int32($this->stringsCount);
        $buffer .= Serializer::int32($this->translatedCount);
        $buffer .= Serializer::bytes($this->translationsUrl);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $official = ($flags & (1 << 0)) ? true : null;
        $rtl = ($flags & (1 << 2)) ? true : null;
        $beta = ($flags & (1 << 3)) ? true : null;
        $name = Deserializer::bytes($stream);
        $nativeName = Deserializer::bytes($stream);
        $langCode = Deserializer::bytes($stream);
        $baseLangCode = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $pluralCode = Deserializer::bytes($stream);
        $stringsCount = Deserializer::int32($stream);
        $translatedCount = Deserializer::int32($stream);
        $translationsUrl = Deserializer::bytes($stream);
        return new self(
            $name,
            $nativeName,
            $langCode,
            $pluralCode,
            $stringsCount,
            $translatedCount,
            $translationsUrl,
            $official,
            $rtl,
            $beta,
            $baseLangCode
        );
    }
}