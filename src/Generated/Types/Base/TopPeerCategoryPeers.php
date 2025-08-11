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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->category->serialize();
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $category = AbstractTopPeerCategory::deserialize($stream);
        $count = Deserializer::int32($stream);
        $peers = Deserializer::vectorOfObjects($stream, [TopPeer::class, 'deserialize']);
        return new self(
            $category,
            $count,
            $peers
        );
    }
}