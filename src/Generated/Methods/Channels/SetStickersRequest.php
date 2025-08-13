<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.setStickers
 */
final class SetStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xea8ca4f9;
    
    public string $predicate = 'channels.setStickers';
    
    public function getMethodName(): string
    {
        return 'channels.setStickers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputStickerSet $stickerset
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputStickerSet $stickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->stickerset->serialize();
        return $buffer;
    }
}