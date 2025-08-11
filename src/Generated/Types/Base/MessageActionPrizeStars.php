<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionPrizeStars
 */
final class MessageActionPrizeStars extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xb00c47a2;
    
    public string $_ = 'messageActionPrizeStars';
    
    /**
     * @param int $stars
     * @param string $transactionId
     * @param AbstractPeer $boostPeer
     * @param int $giveawayMsgId
     * @param bool|null $unclaimed
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $transactionId,
        public readonly AbstractPeer $boostPeer,
        public readonly int $giveawayMsgId,
        public readonly ?bool $unclaimed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unclaimed) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->transactionId);
        $buffer .= $this->boostPeer->serialize();
        $buffer .= Serializer::int32($this->giveawayMsgId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $unclaimed = ($flags & (1 << 0)) ? true : null;
        $stars = Deserializer::int64($stream);
        $transactionId = Deserializer::bytes($stream);
        $boostPeer = AbstractPeer::deserialize($stream);
        $giveawayMsgId = Deserializer::int32($stream);
        return new self(
            $stars,
            $transactionId,
            $boostPeer,
            $giveawayMsgId,
            $unclaimed
        );
    }
}