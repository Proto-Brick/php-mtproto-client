<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.sendReaction
 */
final class SendReactionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7fd736b2;
    
    public string $_ = 'stories.sendReaction';
    
    public function getMethodName(): string
    {
        return 'stories.sendReaction';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $storyId
     * @param AbstractReaction $reaction
     * @param bool|null $addToRecent
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $storyId,
        public readonly AbstractReaction $reaction,
        public readonly ?bool $addToRecent = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->addToRecent) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->storyId);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}