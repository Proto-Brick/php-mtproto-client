<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.removeStickerFromSet
 */
final class RemoveStickerFromSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf7760f51;
    
    public string $predicate = 'stickers.removeStickerFromSet';
    
    public function getMethodName(): string
    {
        return 'stickers.removeStickerFromSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sticker->serialize();
        return $buffer;
    }
}