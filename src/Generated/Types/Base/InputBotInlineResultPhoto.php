<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultPhoto
 */
final class InputBotInlineResultPhoto extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0xa8d864a7;
    
    public string $_ = 'inputBotInlineResultPhoto';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $this->photo->serialize($serializer);
        $buffer .= $this->sendMessage->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $type = $deserializer->bytes($stream);
        $photo = AbstractInputPhoto::deserialize($deserializer, $stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($deserializer, $stream);
        return new self(
            $id,
            $type,
            $photo,
            $sendMessage
        );
    }
}