<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messageActionPrizeStars
 */
final class MessageActionPrizeStars extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xb00c47a2;
    
    public string $predicate = 'messageActionPrizeStars';
    
    /**
     * @param int $stars
     * @param string $transactionId
     * @param AbstractPeer $boostPeer
     * @param int $giveawayMsgId
     * @param true|null $unclaimed
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $transactionId,
        public readonly AbstractPeer $boostPeer,
        public readonly int $giveawayMsgId,
        public readonly ?true $unclaimed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unclaimed) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->transactionId);
        $buffer .= $this->boostPeer->serialize();
        $buffer .= Serializer::int32($this->giveawayMsgId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $unclaimed = (($flags & (1 << 0)) !== 0) ? true : null;
        $stars = Deserializer::int64($__payload, $__offset);
        $transactionId = Deserializer::bytes($__payload, $__offset);
        $boostPeer = AbstractPeer::deserialize($__payload, $__offset);
        $giveawayMsgId = Deserializer::int32($__payload, $__offset);

        return new self(
            $stars,
            $transactionId,
            $boostPeer,
            $giveawayMsgId,
            $unclaimed
        );
    }
}