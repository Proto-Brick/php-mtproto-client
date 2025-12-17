<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPeerUserFromMessage
 */
final class InputPeerUserFromMessage extends AbstractInputPeer
{
    public const CONSTRUCTOR_ID = 0xa87b0a1c;
    
    public string $predicate = 'inputPeerUserFromMessage';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractInputPeer::deserialize($__payload, $__offset);
        $msgId = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);

        return new self(
            $peer,
            $msgId,
            $userId
        );
    }
}