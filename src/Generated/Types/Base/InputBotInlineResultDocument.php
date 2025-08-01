<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultDocument
 */
final class InputBotInlineResultDocument extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 4294507972;
    
    public string $_ = 'inputBotInlineResultDocument';
    
    /**
     * @param string $id
     * @param string $type
     * @param AbstractInputDocument $document
     * @param AbstractInputBotInlineMessage $sendMessage
     * @param string|null $title
     * @param string|null $description
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly AbstractInputDocument $document,
        public readonly AbstractInputBotInlineMessage $sendMessage,
        public readonly ?string $title = null,
        public readonly ?string $description = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->description !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->type);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->description);
        }
        $buffer .= $this->document->serialize($serializer);
        $buffer .= $this->sendMessage->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->bytes($stream);
        $type = $deserializer->bytes($stream);
        $title = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $description = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $document = AbstractInputDocument::deserialize($deserializer, $stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($deserializer, $stream);
            return new self(
            $id,
            $type,
            $document,
            $sendMessage,
            $title,
            $description
        );
    }
}