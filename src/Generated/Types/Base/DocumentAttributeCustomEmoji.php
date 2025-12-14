<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/documentAttributeCustomEmoji
 */
final class DocumentAttributeCustomEmoji extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0xfd149899;
    
    public string $predicate = 'documentAttributeCustomEmoji';
    
    /**
     * @param string $alt
     * @param AbstractInputStickerSet $stickerset
     * @param true|null $free
     * @param true|null $textColor
     */
    public function __construct(
        public readonly string $alt,
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?true $free = null,
        public readonly ?true $textColor = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->free) {
            $flags |= (1 << 0);
        }
        if ($this->textColor) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->alt);
        $buffer .= $this->stickerset->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $free = (($flags & (1 << 0)) !== 0) ? true : null;
        $textColor = (($flags & (1 << 1)) !== 0) ? true : null;
        $alt = Deserializer::bytes($stream);
        $stickerset = AbstractInputStickerSet::deserialize($stream);

        return new self(
            $alt,
            $stickerset,
            $free,
            $textColor
        );
    }
}