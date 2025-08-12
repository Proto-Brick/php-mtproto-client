<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/emojiKeywordsDifference
 */
final class EmojiKeywordsDifference extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5cc761bd;
    
    public string $predicate = 'emojiKeywordsDifference';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->fromVersion);
        $buffer .= Serializer::int32($this->version);
        $buffer .= Serializer::vectorOfObjects($this->keywords);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $langCode = Deserializer::bytes($stream);
        $fromVersion = Deserializer::int32($stream);
        $version = Deserializer::int32($stream);
        $keywords = Deserializer::vectorOfObjects($stream, [AbstractEmojiKeyword::class, 'deserialize']);

        return new self(
            $langCode,
            $fromVersion,
            $version,
            $keywords
        );
    }
}