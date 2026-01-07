<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChatPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.editPhoto
 */
final class EditPhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf12e57c9;
    
    public string $predicate = 'channels.editPhoto';
    
    public function getMethodName(): string
    {
        return 'channels.editPhoto';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputChatPhoto $photo
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputChatPhoto $photo
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->photo->serialize();
        return $buffer;
    }
}