<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateDeleteScheduledMessages
 */
final class UpdateDeleteScheduledMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf2a71983;
    
    public string $predicate = 'updateDeleteScheduledMessages';
    
    /**
     * @param AbstractPeer $peer
     * @param list<int> $messages
     * @param list<int>|null $sentMessages
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $messages,
        public readonly ?array $sentMessages = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sentMessages !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->messages);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->sentMessages);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $messages = Deserializer::vectorOfInts($__payload, $__offset);
        $sentMessages = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfInts($__payload, $__offset) : null;

        return new self(
            $peer,
            $messages,
            $sentMessages
        );
    }
}