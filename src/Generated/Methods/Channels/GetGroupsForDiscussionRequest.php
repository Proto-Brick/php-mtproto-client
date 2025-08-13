<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getGroupsForDiscussion
 */
final class GetGroupsForDiscussionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf5dad378;
    
    public string $predicate = 'channels.getGroupsForDiscussion';
    
    public function getMethodName(): string
    {
        return 'channels.getGroupsForDiscussion';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}