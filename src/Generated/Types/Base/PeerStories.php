<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/peerStories
 */
final class PeerStories extends AbstractPeerStories
{
    public const CONSTRUCTOR_ID = 2587224473;
    
    public string $_ = 'peerStories';
    
    /**
     * @param AbstractPeer $peer
     * @param list<AbstractStoryItem> $stories
     * @param int|null $maxReadId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $stories,
        public readonly ?int $maxReadId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->maxReadId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->maxReadId);
        }
        $buffer .= $serializer->vectorOfObjects($this->stories);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $maxReadId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $stories = $deserializer->vectorOfObjects($stream, [AbstractStoryItem::class, 'deserialize']);
            return new self(
            $peer,
            $stories,
            $maxReadId
        );
    }
}