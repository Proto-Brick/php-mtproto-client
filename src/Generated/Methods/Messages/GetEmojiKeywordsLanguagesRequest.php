<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
 */
final class GetEmojiKeywordsLanguagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4e9963b2;
    
    public string $predicate = 'messages.getEmojiKeywordsLanguages';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywordsLanguages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . EmojiLanguage::class . '>';
    }
    /**
     * @param list<string> $langCodes
     */
    public function __construct(
        public readonly array $langCodes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->langCodes);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}