<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiKeywordsDifference
 */
final class EmojiKeywordsDifference extends AbstractEmojiKeywordsDifference
{
    public const CONSTRUCTOR_ID = 1556570557;
    
    public string $_ = 'emojiKeywordsDifference';
    
    /**
     * @param string $langCode
     * @param int $fromVersion
     * @param int $version
     * @param list<AbstractEmojiKeyword> $keywords
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $fromVersion,
        public readonly int $version,
        public readonly array $keywords
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->int32($this->fromVersion);
        $buffer .= $serializer->int32($this->version);
        $buffer .= $serializer->vectorOfObjects($this->keywords);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $langCode = $deserializer->bytes($stream);
        $fromVersion = $deserializer->int32($stream);
        $version = $deserializer->int32($stream);
        $keywords = $deserializer->vectorOfObjects($stream, [AbstractEmojiKeyword::class, 'deserialize']);
            return new self(
            $langCode,
            $fromVersion,
            $version,
            $keywords
        );
    }
}