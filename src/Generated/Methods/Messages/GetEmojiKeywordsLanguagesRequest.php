<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiLanguage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
 */
final class GetEmojiKeywordsLanguagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1318675378;
    
    public string $_ = 'messages.getEmojiKeywordsLanguages';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywordsLanguages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiLanguage::class;
    }
    /**
     * @param list<string> $langCodes
     */
    public function __construct(
        public readonly array $langCodes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfStrings($this->langCodes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}