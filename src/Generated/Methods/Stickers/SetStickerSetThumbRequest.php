<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.setStickerSetThumb
 */
final class SetStickerSetThumbRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa76a5392;
    
    public string $predicate = 'stickers.setStickerSetThumb';
    
    public function getMethodName(): string
    {
        return 'stickers.setStickerSetThumb';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param AbstractInputDocument|null $thumb
     * @param int|null $thumbDocumentId
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly ?AbstractInputDocument $thumb = null,
        public readonly ?int $thumbDocumentId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->thumb !== null) {
            $flags |= (1 << 0);
        }
        if ($this->thumbDocumentId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->stickerset->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->thumb->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->thumbDocumentId);
        }
        return $buffer;
    }
}