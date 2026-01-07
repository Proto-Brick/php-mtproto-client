<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetItem;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.replaceSticker
 */
final class ReplaceStickerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4696459a;
    
    public string $predicate = 'stickers.replaceSticker';
    
    public function getMethodName(): string
    {
        return 'stickers.replaceSticker';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     * @param InputStickerSetItem $newSticker
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker,
        public readonly InputStickerSetItem $newSticker
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sticker->serialize();
        $buffer .= $this->newSticker->serialize();
        return $buffer;
    }
}