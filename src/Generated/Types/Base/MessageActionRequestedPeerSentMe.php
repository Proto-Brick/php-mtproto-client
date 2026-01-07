<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionRequestedPeerSentMe
 */
final class MessageActionRequestedPeerSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x93b31848;
    
    public string $predicate = 'messageActionRequestedPeerSentMe';
    
    /**
     * @param int $buttonId
     * @param list<AbstractRequestedPeer> $peers
     */
    public function __construct(
        public readonly int $buttonId,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $buttonId = Deserializer::int32($__payload, $__offset);
        $peers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractRequestedPeer::class, 'deserialize']);

        return new self(
            $buttonId,
            $peers
        );
    }
}