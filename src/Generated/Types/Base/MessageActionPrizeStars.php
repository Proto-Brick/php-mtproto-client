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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unclaimed) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->stars);
        $buffer .= $serializer->bytes($this->transactionId);
        $buffer .= $this->boostPeer->serialize($serializer);
        $buffer .= $serializer->int32($this->giveawayMsgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $unclaimed = ($flags & (1 << 0)) ? true : null;
        $stars = $deserializer->int64($stream);
        $transactionId = $deserializer->bytes($stream);
        $boostPeer = AbstractPeer::deserialize($deserializer, $stream);
        $giveawayMsgId = $deserializer->int32($stream);
        return new self(
            $stars,
            $transactionId,
            $boostPeer,
            $giveawayMsgId,
            $unclaimed
        );
    }
}