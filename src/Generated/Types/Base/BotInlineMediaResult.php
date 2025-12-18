<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/botInlineMediaResult
 */
final class BotInlineMediaResult extends AbstractBotInlineResult
{
    public const CONSTRUCTOR_ID = 0x17db940b;
    
    public string $predicate = 'botInlineMediaResult';
    
    /**
     * @param string $id
     * @param string $type
     * @param AbstractBotInlineMessage $sendMessage
     * @param AbstractPhoto|null $photo
     * @param AbstractDocument|null $document
     * @param string|null $title
     * @param string|null $description
     */
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly AbstractBotInlineMessage $sendMessage,
        public readonly ?AbstractPhoto $photo = null,
        public readonly ?AbstractDocument $document = null,
        public readonly ?string $title = null,
        public readonly ?string $description = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) {
            $flags |= (1 << 0);
        }
        if ($this->document !== null) {
            $flags |= (1 << 1);
        }
        if ($this->title !== null) {
            $flags |= (1 << 2);
        }
        if ($this->description !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->type);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->document->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->description);
        }
        $buffer .= $this->sendMessage->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $id = Deserializer::bytes($__payload, $__offset);
        $type = Deserializer::bytes($__payload, $__offset);
        $photo = (($flags & (1 << 0)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;
        $document = (($flags & (1 << 1)) !== 0) ? AbstractDocument::deserialize($__payload, $__offset) : null;
        $title = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $description = (($flags & (1 << 3)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $sendMessage = AbstractBotInlineMessage::deserialize($__payload, $__offset);

        return new self(
            $id,
            $type,
            $sendMessage,
            $photo,
            $document,
            $title,
            $description
        );
    }
}