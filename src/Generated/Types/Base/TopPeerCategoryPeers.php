<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/topPeerCategoryPeers
 */
final class TopPeerCategoryPeers extends AbstractTopPeerCategoryPeers
{
    public const CONSTRUCTOR_ID = 4219683473;
    
    public string $_ = 'topPeerCategoryPeers';
    
    /**
     * @param AbstractTopPeerCategory $category
     * @param int $count
     * @param list<AbstractTopPeer> $peers
     */
    public function __construct(
        public readonly AbstractTopPeerCategory $category,
        public readonly int $count,
        public readonly array $peers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->category->serialize($serializer);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $category = AbstractTopPeerCategory::deserialize($deserializer, $stream);
        $count = $deserializer->int32($stream);
        $peers = $deserializer->vectorOfObjects($stream, [AbstractTopPeer::class, 'deserialize']);
            return new self(
            $category,
            $count,
            $peers
        );
    }
}