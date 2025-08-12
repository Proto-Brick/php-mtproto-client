<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReaction;
use DigitalStars\MtprotoClient\Generated\Types\Stories\StoryReactionsList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getStoryReactionsList
 */
final class GetStoryReactionsListRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb9b2881f;
    
    public string $predicate = 'stories.getStoryReactionsList';
    
    public function getMethodName(): string
    {
        return 'stories.getStoryReactionsList';
    }
    
    public function getResponseClass(): string
    {
        return StoryReactionsList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param int $limit
     * @param true|null $forwardsFirst
     * @param AbstractReaction|null $reaction
     * @param string|null $offset
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly int $limit,
        public readonly ?true $forwardsFirst = null,
        public readonly ?AbstractReaction $reaction = null,
        public readonly ?string $offset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forwardsFirst) $flags |= (1 << 2);
        if ($this->reaction !== null) $flags |= (1 << 0);
        if ($this->offset !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->reaction->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->offset);
        }
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}