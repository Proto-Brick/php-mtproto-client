<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickeredMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStickerSetCovered;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAttachedStickers
 */
final class GetAttachedStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcc5b67cc;
    
    public string $predicate = 'messages.getAttachedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getAttachedStickers';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractStickerSetCovered::class . '>';
    }
    /**
     * @param AbstractInputStickeredMedia $media
     */
    public function __construct(
        public readonly AbstractInputStickeredMedia $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->media->serialize();
        return $buffer;
    }
}