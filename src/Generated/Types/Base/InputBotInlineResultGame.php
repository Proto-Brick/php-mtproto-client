<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultGame
 */
final class InputBotInlineResultGame extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0x4fa417f2;
    
    public string $_ = 'inputBotInlineResultGame';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->shortName);
        $buffer .= $this->sendMessage->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $shortName = $deserializer->bytes($stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($deserializer, $stream);
        return new self(
            $id,
            $shortName,
            $sendMessage
        );
    }
}