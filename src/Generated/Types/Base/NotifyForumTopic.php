<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/notifyForumTopic
 */
final class NotifyForumTopic extends AbstractNotifyPeer
{
    public const CONSTRUCTOR_ID = 0x226e6308;
    
    public string $predicate = 'notifyForumTopic';
    
    /**
     * @param AbstractPeer $peer
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMsgId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $topMsgId = Deserializer::int32($stream);

        return new self(
            $peer,
            $topMsgId
        );
    }
}