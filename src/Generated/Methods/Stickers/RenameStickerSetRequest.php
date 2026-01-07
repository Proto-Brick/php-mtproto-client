<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.renameStickerSet
 */
final class RenameStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x124b1c00;
    
    public string $predicate = 'stickers.renameStickerSet';
    
    public function getMethodName(): string
    {
        return 'stickers.renameStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param string $title
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly string $title
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= Serializer::bytes($this->title);
        return $buffer;
    }
}