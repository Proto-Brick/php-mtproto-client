<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiKeywordsDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywordsDifference
 */
final class GetEmojiKeywordsDifferenceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 352892591;
    
    public string $_ = 'messages.getEmojiKeywordsDifference';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywordsDifference';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiKeywordsDifference::class;
    }
    /**
     * @param string $langCode
     * @param int $fromVersion
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $fromVersion
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->int32($this->fromVersion);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}