<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPeerChannelFromMessage
 */
final class InputPeerChannelFromMessage extends AbstractInputPeer
{
    public const CONSTRUCTOR_ID = 0xbd2a0840;
    
    public string $predicate = 'inputPeerChannelFromMessage';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $channelId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $channelId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->channelId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $channelId = Deserializer::int64($__payload, $__offset);

        return new self(
            $peer,
            $msgId,
            $channelId
        );
    }
}