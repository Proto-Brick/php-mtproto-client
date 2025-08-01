<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotChatBoost
 */
final class UpdateBotChatBoost extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2421019804;
    
    public string $_ = 'updateBotChatBoost';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractBoost $boost
     * @param int $qts
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractBoost $boost,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->boost->serialize($serializer);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $boost = AbstractBoost::deserialize($deserializer, $stream);
        $qts = $deserializer->int32($stream);
            return new self(
            $peer,
            $boost,
            $qts
        );
    }
}