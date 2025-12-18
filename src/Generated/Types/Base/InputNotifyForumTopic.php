<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputNotifyForumTopic
 */
final class InputNotifyForumTopic extends AbstractInputNotifyPeer
{
    public const CONSTRUCTOR_ID = 0x5c467992;
    
    public string $predicate = 'inputNotifyForumTopic';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->topMsgId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $topMsgId = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $topMsgId
        );
    }
}