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
    public const CONSTRUCTOR_ID = 630664139;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= (new DataJSON(json_encode($this->interaction)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $emoticon = $deserializer->bytes($stream);
        $msgId = $deserializer->int32($stream);
        $interaction = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $emoticon,
            $msgId,
            $interaction
        );
    }
}