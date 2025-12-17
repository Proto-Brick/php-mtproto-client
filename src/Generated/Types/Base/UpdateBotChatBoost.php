<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateBotChatBoost
 */
final class UpdateBotChatBoost extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x904dd49c;
    
    public string $predicate = 'updateBotChatBoost';
    
    /**
     * @param AbstractPeer $peer
     * @param Boost $boost
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly Boost $boost,
        public readonly int $qts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->boost->serialize();
        $buffer .= Serializer::int32($this->qts);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $boost = Boost::deserialize($__payload, $__offset);
        $qts = Deserializer::int32($__payload, $__offset);

        return new self(
            $peer,
            $boost,
            $qts
        );
    }
}