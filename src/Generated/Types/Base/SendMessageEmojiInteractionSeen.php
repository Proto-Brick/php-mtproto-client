<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendMessageEmojiInteractionSeen
 */
final class SendMessageEmojiInteractionSeen extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0xb665902e;
    
    public string $_ = 'sendMessageEmojiInteractionSeen';
    
    /**
     * @param string $emoticon
     */
    public function __construct(
        public readonly string $emoticon
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $emoticon = $deserializer->bytes($stream);
        return new self(
            $emoticon
        );
    }
}