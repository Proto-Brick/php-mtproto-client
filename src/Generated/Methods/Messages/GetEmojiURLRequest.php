<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\EmojiURL;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiURL
 */
final class GetEmojiURLRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd5b10c26;
    
    public string $_ = 'messages.getEmojiURL';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiURL';
    }
    
    public function getResponseClass(): string
    {
        return EmojiURL::class;
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