<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiKeywordsDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywords
 */
final class GetEmojiKeywordsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 899735650;
    
    public string $_ = 'messages.getEmojiKeywords';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywords';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiKeywordsDifference::class;
    }
    /**
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}