<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiKeywordsDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywords
 */
final class GetEmojiKeywordsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x35a0e062;
    
    public string $predicate = 'messages.getEmojiKeywords';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywords';
    }
    
    public function getResponseClass(): string
    {
        return EmojiKeywordsDifference::class;
    }
    /**
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}