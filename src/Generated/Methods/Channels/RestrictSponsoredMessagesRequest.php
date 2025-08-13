<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.restrictSponsoredMessages
 */
final class RestrictSponsoredMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9ae91519;
    
    public string $predicate = 'channels.restrictSponsoredMessages';
    
    public function getMethodName(): string
    {
        return 'channels.restrictSponsoredMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param bool $restricted
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly bool $restricted
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= ($this->restricted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}