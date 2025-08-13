<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/sendMessageEmojiInteraction
 */
final class SendMessageEmojiInteraction extends AbstractSendMessageAction
{
    public const CONSTRUCTOR_ID = 0x25972bcb;
    
    public string $predicate = 'sendMessageEmojiInteraction';
    
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
        $buffer .= Serializer::serializeDataJSON($this->interaction);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
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