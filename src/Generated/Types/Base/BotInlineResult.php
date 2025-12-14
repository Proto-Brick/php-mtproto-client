<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineResult
 */
final class BotInlineResult extends AbstractBotInlineResult
{
    public const CONSTRUCTOR_ID = 0x11965f3a;
    
    public string $predicate = 'botInlineResult';
    
    /**
     * @param string $id
     * @param string $type
     * @param AbstractBotInlineMessage $sendMessage
     * @param string|null $title
     * @param string|null $description
     * @param string|null $url
     * @param AbstractWebDocument|null $thumb
     * @param AbstractWebDocument|null $content
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly AbstractBotInlineMessage $sendMessage,
        public readonly ?string $title = null,
        public readonly ?string $description = null,
        public readonly ?string $url = null,
        public readonly ?AbstractWebDocument $thumb = null,
        public readonly ?AbstractWebDocument $content = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) {
            $flags |= (1 << 1);
        }
        if ($this->description !== null) {
            $flags |= (1 << 2);
        }
        if ($this->url !== null) {
            $flags |= (1 << 3);
        }
        if ($this->thumb !== null) {
            $flags |= (1 << 4);
        }
        if ($this->content !== null) {
            $flags |= (1 << 5);
        }
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
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $id = Deserializer::bytes($stream);
        $type = Deserializer::bytes($stream);
        $title = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $description = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($stream) : null;
        $url = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($stream) : null;
        $thumb = (($flags & (1 << 4)) !== 0) ? AbstractWebDocument::deserialize($stream) : null;
        $content = (($flags & (1 << 5)) !== 0) ? AbstractWebDocument::deserialize($stream) : null;
        $sendMessage = AbstractBotInlineMessage::deserialize($stream);

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