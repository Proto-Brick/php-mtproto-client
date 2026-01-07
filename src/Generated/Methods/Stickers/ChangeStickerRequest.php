<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MaskCoords;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.changeSticker
 */
final class ChangeStickerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf5537ebc;
    
    public string $predicate = 'stickers.changeSticker';
    
    public function getMethodName(): string
    {
        return 'stickers.changeSticker';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     * @param string|null $emoji
     * @param MaskCoords|null $maskCoords
     * @param string|null $keywords
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker,
        public readonly ?string $emoji = null,
        public readonly ?MaskCoords $maskCoords = null,
        public readonly ?string $keywords = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emoji !== null) {
            $flags |= (1 << 0);
        }
        if ($this->maskCoords !== null) {
            $flags |= (1 << 1);
        }
        if ($this->keywords !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->sticker->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->emoji);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->maskCoords->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->keywords);
        }
        return $buffer;
    }
}