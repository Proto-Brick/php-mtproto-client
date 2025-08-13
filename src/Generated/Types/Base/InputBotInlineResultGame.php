<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultGame
 */
final class InputBotInlineResultGame extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0x4fa417f2;
    
    public string $predicate = 'inputBotInlineResultGame';
    
    /**
     * @param string $id
     * @param string $shortName
     * @param AbstractInputBotInlineMessage $sendMessage
     */
    public function __construct(
        public readonly string $id,
        public readonly string $shortName,
        public readonly AbstractInputBotInlineMessage $sendMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->shortName);
        $buffer .= $this->sendMessage->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::bytes($stream);
        $shortName = Deserializer::bytes($stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($stream);

        return new self(
            $id,
            $shortName,
            $sendMessage
        );
    }
}