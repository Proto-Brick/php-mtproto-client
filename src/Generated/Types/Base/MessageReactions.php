<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReactions
 */
final class MessageReactions extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa339f0b;
    
    public string $predicate = 'messageReactions';
    
    /**
     * @param list<ReactionCount> $results
     * @param true|null $min
     * @param true|null $canSeeList
     * @param true|null $reactionsAsTags
     * @param list<MessagePeerReaction>|null $recentReactions
     * @param list<MessageReactor>|null $topReactors
     */
    public function __construct(
        public readonly array $results,
        public readonly ?true $min = null,
        public readonly ?true $canSeeList = null,
        public readonly ?true $reactionsAsTags = null,
        public readonly ?array $recentReactions = null,
        public readonly ?array $topReactors = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->min) $flags |= (1 << 0);
        if ($this->canSeeList) $flags |= (1 << 2);
        if ($this->reactionsAsTags) $flags |= (1 << 3);
        if ($this->recentReactions !== null) $flags |= (1 << 1);
        if ($this->topReactors !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::vectorOfObjects($this->results);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->recentReactions);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->topReactors);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $min = ($flags & (1 << 0)) ? true : null;
        $canSeeList = ($flags & (1 << 2)) ? true : null;
        $reactionsAsTags = ($flags & (1 << 3)) ? true : null;
        $results = Deserializer::vectorOfObjects($stream, [ReactionCount::class, 'deserialize']);
        $recentReactions = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [MessagePeerReaction::class, 'deserialize']) : null;
        $topReactors = ($flags & (1 << 4)) ? Deserializer::vectorOfObjects($stream, [MessageReactor::class, 'deserialize']) : null;

        return new self(
            $results,
            $min,
            $canSeeList,
            $reactionsAsTags,
            $recentReactions,
            $topReactors
        );
    }
}