<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\ForumTopics;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getForumTopicsByID
 */
final class GetForumTopicsByIDRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xaf0a4a08;
    
    public string $predicate = 'messages.getForumTopicsByID';
    
    public function getMethodName(): string
    {
        return 'messages.getForumTopicsByID';
    }
    
    public function getResponseClass(): string
    {
        return ForumTopics::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $topics
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $topics
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->topics);
        return $buffer;
    }
}