<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultPhoto
 */
final class InputBotInlineResultPhoto extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0xa8d864a7;
    
    public string $predicate = 'inputBotInlineResultPhoto';
    
    /**
     * @param string $id
     * @param string $type
     * @param AbstractInputPhoto $photo
     * @param AbstractInputBotInlineMessage $sendMessage
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly AbstractInputPhoto $photo,
        public readonly AbstractInputBotInlineMessage $sendMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= $this->photo->serialize();
        $buffer .= $this->sendMessage->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::bytes($stream);
        $type = Deserializer::bytes($stream);
        $photo = AbstractInputPhoto::deserialize($stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($stream);

        return new self(
            $id,
            $type,
            $photo,
            $sendMessage
        );
    }
}