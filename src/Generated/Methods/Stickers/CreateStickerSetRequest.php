<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetItem;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.createStickerSet
 */
final class CreateStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9021ab67;
    
    public string $predicate = 'stickers.createStickerSet';
    
    public function getMethodName(): string
    {
        return 'stickers.createStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param string $title
     * @param string $shortName
     * @param list<InputStickerSetItem> $stickers
     * @param true|null $masks
     * @param true|null $emojis
     * @param true|null $textColor
     * @param AbstractInputDocument|null $thumb
     * @param string|null $software
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $title,
        public readonly string $shortName,
        public readonly array $stickers,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null,
        public readonly ?true $textColor = null,
        public readonly ?AbstractInputDocument $thumb = null,
        public readonly ?string $software = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) {
            $flags |= (1 << 0);
        }
        if ($this->emojis) {
            $flags |= (1 << 5);
        }
        if ($this->textColor) {
            $flags |= (1 << 6);
        }
        if ($this->thumb !== null) {
            $flags |= (1 << 2);
        }
        if ($this->software !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::bytes($this->shortName);
        if ($flags & (1 << 2)) {
            $buffer .= $this->thumb->serialize();
        }
        $buffer .= Serializer::vectorOfObjects($this->stickers);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->software);
        }
        return $buffer;
    }
}