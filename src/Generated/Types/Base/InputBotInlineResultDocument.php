<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputBotInlineResultDocument
 */
final class InputBotInlineResultDocument extends AbstractInputBotInlineResult
{
    public const CONSTRUCTOR_ID = 0xfff8fdc4;
    
    public string $predicate = 'inputBotInlineResultDocument';
    
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
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->type);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->description);
        }
        $buffer .= $this->document->serialize();
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
        $document = AbstractInputDocument::deserialize($stream);
        $sendMessage = AbstractInputBotInlineMessage::deserialize($stream);

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