<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiStatus;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.updateEmojiStatus
 */
final class UpdateEmojiStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf0d3e6a8;
    
    public string $predicate = 'channels.updateEmojiStatus';
    
    public function getMethodName(): string
    {
        return 'channels.updateEmojiStatus';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractEmojiStatus $emojiStatus
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractEmojiStatus $emojiStatus
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->emojiStatus->serialize();
        return $buffer;
    }
}