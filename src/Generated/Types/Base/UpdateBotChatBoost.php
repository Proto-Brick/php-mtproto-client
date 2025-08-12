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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $peer = AbstractPeer::deserialize($stream);
        $boost = Boost::deserialize($stream);
        $qts = Deserializer::int32($stream);

        return new self(
            $peer,
            $boost,
            $qts
        );
    }
}