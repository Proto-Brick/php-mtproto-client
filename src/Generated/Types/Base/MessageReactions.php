<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageReactions
 */
final class MessageReactions extends AbstractMessageReactions
{
    public const CONSTRUCTOR_ID = 171155211;
    
    public string $_ = 'messageReactions';
    
    /**
     * @param list<AbstractReactionCount> $results
     * @param bool|null $min
     * @param bool|null $canSeeList
     * @param bool|null $reactionsAsTags
     * @param list<AbstractMessagePeerReaction>|null $recentReactions
     * @param list<AbstractMessageReactor>|null $topReactors
     */
    public function __construct(
        public readonly array $results,
        public readonly ?bool $min = null,
        public readonly ?bool $canSeeList = null,
        public readonly ?bool $reactionsAsTags = null,
        public readonly ?array $recentReactions = null,
        public readonly ?array $topReactors = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->min) $flags |= (1 << 0);
        if ($this->canSeeList) $flags |= (1 << 2);
        if ($this->reactionsAsTags) $flags |= (1 << 3);
        if ($this->recentReactions !== null) $flags |= (1 << 1);
        if ($this->topReactors !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->results);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->recentReactions);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->vectorOfObjects($this->topReactors);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $min = ($flags & (1 << 0)) ? true : null;
        $canSeeList = ($flags & (1 << 2)) ? true : null;
        $reactionsAsTags = ($flags & (1 << 3)) ? true : null;
        $results = $deserializer->vectorOfObjects($stream, [AbstractReactionCount::class, 'deserialize']);
        $recentReactions = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractMessagePeerReaction::class, 'deserialize']) : null;
        $topReactors = ($flags & (1 << 4)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageReactor::class, 'deserialize']) : null;
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