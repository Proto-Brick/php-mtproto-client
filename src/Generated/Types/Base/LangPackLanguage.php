<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackLanguage
 */
final class LangPackLanguage extends AbstractLangPackLanguage
{
    public const CONSTRUCTOR_ID = 4006239459;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->official) $flags |= (1 << 0);
        if ($this->rtl) $flags |= (1 << 2);
        if ($this->beta) $flags |= (1 << 3);
        if ($this->baseLangCode !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->name);
        $buffer .= $serializer->bytes($this->nativeName);
        $buffer .= $serializer->bytes($this->langCode);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->baseLangCode);
        }
        $buffer .= $serializer->bytes($this->pluralCode);
        $buffer .= $serializer->int32($this->stringsCount);
        $buffer .= $serializer->int32($this->translatedCount);
        $buffer .= $serializer->bytes($this->translationsUrl);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $official = ($flags & (1 << 0)) ? true : null;
        $rtl = ($flags & (1 << 2)) ? true : null;
        $beta = ($flags & (1 << 3)) ? true : null;
        $name = $deserializer->bytes($stream);
        $nativeName = $deserializer->bytes($stream);
        $langCode = $deserializer->bytes($stream);
        $baseLangCode = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $pluralCode = $deserializer->bytes($stream);
        $stringsCount = $deserializer->int32($stream);
        $translatedCount = $deserializer->int32($stream);
        $translationsUrl = $deserializer->bytes($stream);
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