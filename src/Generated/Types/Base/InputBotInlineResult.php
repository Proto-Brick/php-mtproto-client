<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBotInlineResult
 */
final class InputBotInlineResult extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0x88bf9319;
    
    public string $_ = 'inputBotInlineResult';
    
    /**
     * @param string $id
     * @param string $type
     * @param AbstractInputBotInlineMessage $sendMessage
     * @param string|null $title
     * @param string|null $description
     * @param string|null $url
     * @param InputWebDocument|null $thumb
     * @param InputWebDocument|null $content
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly AbstractInputBotInlineMessage $sendMessage,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $url = null,
        public readonly ?InputWebDocument $thumb = null,
        public readonly ?InputWebDocument $content = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->description !== null) $flags |= (1 << 2);
        if ($this->url !== null) $flags |= (1 << 3);
        if ($this->thumb !== null) $flags |= (1 << 4);
        if ($this->content !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->type);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->description);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->url);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->thumb->serialize($serializer);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->content->serialize($serializer);
        }
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
        $url = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $thumb = ($flags & (1 << 4)) ? InputWebDocument::deserialize($deserializer, $stream) : null;
        $content = ($flags & (1 << 5)) ? InputWebDocument::deserialize($deserializer, $stream) : null;
        $sendMessage = AbstractInputBotInlineMessage::deserialize($deserializer, $stream);
        return new self(
            $id,
            $type,
            $sendMessage,
            $title,
            $description,
            $url,
            $thumb,
            $content
        );
    }
}