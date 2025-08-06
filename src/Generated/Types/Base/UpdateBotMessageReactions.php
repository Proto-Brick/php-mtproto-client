<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotMessageReactions
 */
final class UpdateBotMessageReactions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x9cb7759;
    
    public string $_ = 'updateBotMessageReactions';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param int $date
     * @param list<ReactionCount> $reactions
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly int $date,
        public readonly array $reactions,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->vectorOfObjects($this->reactions);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
        $date = $deserializer->int32($stream);
        $reactions = $deserializer->vectorOfObjects($stream, [ReactionCount::class, 'deserialize']);
        $qts = $deserializer->int32($stream);
        return new self(
            $peer,
            $msgId,
            $date,
            $reactions,
            $qts
        );
    }
}