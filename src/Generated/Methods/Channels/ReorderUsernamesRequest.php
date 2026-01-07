<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.reorderUsernames
 */
final class ReorderUsernamesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb45ced1d;
    
    public string $predicate = 'channels.reorderUsernames';
    
    public function getMethodName(): string
    {
        return 'channels.reorderUsernames';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<string> $order
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $order
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfStrings($this->order);
        return $buffer;
    }
}