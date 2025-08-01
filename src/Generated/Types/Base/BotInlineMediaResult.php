<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInlineMediaResult
 */
final class BotInlineMediaResult extends AbstractBotInlineResult
{
    public const CONSTRUCTOR_ID = 400266251;
    
    public string $_ = 'botInlineMediaResult';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->photo !== null) $flags |= (1 << 0);
        if ($this->document !== null) $flags |= (1 << 1);
        if ($this->title !== null) $flags |= (1 << 2);
        if ($this->description !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->type);
        if ($flags & (1 << 0)) {
            $buffer .= $this->photo->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->document->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->title);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->bytes($this->description);
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
        $photo = ($flags & (1 << 0)) ? AbstractPhoto::deserialize($deserializer, $stream) : null;
        $document = ($flags & (1 << 1)) ? AbstractDocument::deserialize($deserializer, $stream) : null;
        $title = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $description = ($flags & (1 << 3)) ? $deserializer->bytes($stream) : null;
        $sendMessage = AbstractBotInlineMessage::deserialize($deserializer, $stream);
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