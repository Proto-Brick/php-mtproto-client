<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stickers;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stickers.deleteStickerSet
 */
final class DeleteStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x87704394;
    
    public string $predicate = 'stickers.deleteStickerSet';
    
    public function getMethodName(): string
    {
        return 'stickers.deleteStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        return $buffer;
    }
}