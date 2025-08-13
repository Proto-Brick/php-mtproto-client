<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.searchPosts
 */
final class SearchPostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf2c4f24d;
    
    public string $predicate = 'channels.searchPosts';
    
    public function getMethodName(): string
    {
        return 'channels.searchPosts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param int $offsetRate
     * @param AbstractInputPeer $offsetPeer
     * @param int $offsetId
     * @param int $limit
     * @param string|null $hashtag
     * @param string|null $query
     * @param int|null $allowPaidStars
     */
    public function __construct(
        public readonly int $offsetRate,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $offsetId,
        public readonly int $limit,
        public readonly ?string $hashtag = null,
        public readonly ?string $query = null,
        public readonly ?int $allowPaidStars = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hashtag !== null) $flags |= (1 << 0);
        if ($this->query !== null) $flags |= (1 << 1);
        if ($this->allowPaidStars !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->hashtag);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->query);
        }
        $buffer .= Serializer::int32($this->offsetRate);
        $buffer .= $this->offsetPeer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int64($this->allowPaidStars);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}