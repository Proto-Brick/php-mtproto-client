<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.setDiscussionGroup
 */
final class SetDiscussionGroupRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x40582bb2;
    
    public string $predicate = 'channels.setDiscussionGroup';
    
    public function getMethodName(): string
    {
        return 'channels.setDiscussionGroup';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $broadcast
     * @param AbstractInputChannel $group
     */
    public function __construct(
        public readonly AbstractInputChannel $broadcast,
        public readonly AbstractInputChannel $group
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->broadcast->serialize();
        $buffer .= $this->group->serialize();
        return $buffer;
    }
}