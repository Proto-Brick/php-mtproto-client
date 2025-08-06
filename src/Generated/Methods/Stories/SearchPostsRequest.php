<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMediaArea;
use DigitalStars\MtprotoClient\Generated\Types\Stories\FoundStories;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.searchPosts
 */
final class SearchPostsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd1810907;
    
    public string $_ = 'stories.searchPosts';
    
    public function getMethodName(): string
    {
        return 'stories.searchPosts';
    }
    
    public function getResponseClass(): string
    {
        return FoundStories::class;
    }
    /**
     * @param string $offset
     * @param int $limit
     * @param string|null $hashtag
     * @param AbstractMediaArea|null $area
     * @param AbstractInputPeer|null $peer
     */
    public function __construct(
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?string $hashtag = null,
        public readonly ?AbstractMediaArea $area = null,
        public readonly ?AbstractInputPeer $peer = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hashtag !== null) $flags |= (1 << 0);
        if ($this->area !== null) $flags |= (1 << 1);
        if ($this->peer !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->hashtag);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->area->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->peer->serialize($serializer);
        }
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}