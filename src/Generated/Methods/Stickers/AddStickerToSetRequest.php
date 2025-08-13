<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetItem;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.addStickerToSet
 */
final class AddStickerToSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8653febe;
    
    public string $predicate = 'stickers.addStickerToSet';
    
    public function getMethodName(): string
    {
        return 'stickers.addStickerToSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param InputStickerSetItem $sticker
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly InputStickerSetItem $sticker
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= $this->sticker->serialize();
        return $buffer;
    }
}