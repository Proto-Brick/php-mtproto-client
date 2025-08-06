<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/topPeerCategoryPeers
 */
final class TopPeerCategoryPeers extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfb834291;
    
    public string $_ = 'topPeerCategoryPeers';
    
    /**
     * @param AbstractTopPeerCategory $category
     * @param int $count
     * @param list<TopPeer> $peers
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $category = AbstractTopPeerCategory::deserialize($deserializer, $stream);
        $count = $deserializer->int32($stream);
        $peers = $deserializer->vectorOfObjects($stream, [TopPeer::class, 'deserialize']);
        return new self(
            $category,
            $count,
            $peers
        );
    }
}