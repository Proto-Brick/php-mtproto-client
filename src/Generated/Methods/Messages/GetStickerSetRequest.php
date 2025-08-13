<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getStickerSet
 */
final class GetStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc8a0ec74;
    
    public string $predicate = 'messages.getStickerSet';
    
    public function getMethodName(): string
    {
        return 'messages.getStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSet::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}