<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendReaction
 */
final class SendReactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3540875476;
    
    public string $_ = 'messages.sendReaction';
    
    public function getMethodName(): string
    {
        return 'messages.sendReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param bool|null $big
     * @param bool|null $addToRecent
     * @param list<AbstractReaction>|null $reaction
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly ?bool $big = null,
        public readonly ?bool $addToRecent = null,
        public readonly ?array $reaction = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->big) $flags |= (1 << 1);
        if ($this->addToRecent) $flags |= (1 << 2);
        if ($this->reaction !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->reaction);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}