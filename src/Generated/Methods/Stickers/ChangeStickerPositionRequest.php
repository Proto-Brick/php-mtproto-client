<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.changeStickerPosition
 */
final class ChangeStickerPositionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xffb6d4ca;
    
    public string $predicate = 'stickers.changeStickerPosition';
    
    public function getMethodName(): string
    {
        return 'stickers.changeStickerPosition';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputDocument $sticker
     * @param int $position
     */
    public function __construct(
        public readonly AbstractInputDocument $sticker,
        public readonly int $position
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->sticker->serialize();
        $buffer .= Serializer::int32($this->position);
        return $buffer;
    }
}