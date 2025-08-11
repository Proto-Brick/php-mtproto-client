<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/sendMessageEmojiInteraction
 */
final class SendMessageEmojiInteraction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0x25972bcb;
    
    public string $_ = 'sendMessageEmojiInteraction';
    
    /**
     * @param string $emoticon
     * @param int $msgId
     * @param array $interaction
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly int $msgId,
        public readonly array $interaction
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::bytes(json_encode($this->interaction, JSON_FORCE_OBJECT));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $emoticon = Deserializer::bytes($stream);
        $msgId = Deserializer::int32($stream);
        $interaction = Deserializer::deserializeDataJSON($stream);
        return new self(
            $emoticon,
            $msgId,
            $interaction
        );
    }
}