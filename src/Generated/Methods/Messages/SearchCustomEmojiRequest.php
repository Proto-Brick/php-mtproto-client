<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.searchCustomEmoji
 */
final class SearchCustomEmojiRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2c11c0d7;
    
    public string $_ = 'messages.searchCustomEmoji';
    
    public function getMethodName(): string
    {
        return 'messages.searchCustomEmoji';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiList::class;
    }
    /**
     * @param string $emoticon
     * @param int $hash
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}