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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->description !== null) $flags |= (1 << 2);
        if ($this->url !== null) $flags |= (1 << 3);
        if ($this->thumb !== null) $flags |= (1 << 4);
        if ($this->content !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->type);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->description);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->url);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->thumb->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->content->serialize();
        }
        $buffer .= $this->sendMessage->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $id = Deserializer::bytes($stream);
        $type = Deserializer::bytes($stream);
        $title = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $description = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $url = ($flags & (1 << 3)) ? Deserializer::bytes($stream) : null;
        $thumb = ($flags & (1 << 4)) ? InputWebDocument::deserialize($stream) : null;
        $content = ($flags & (1 << 5)) ? InputWebDocument::deserialize($stream) : null;
        $sendMessage = AbstractInputBotInlineMessage::deserialize($stream);
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