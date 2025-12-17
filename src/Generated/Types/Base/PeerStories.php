<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/peerStories
 */
final class PeerStories extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a35e999;
    
    public string $predicate = 'peerStories';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->maxReadId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->maxReadId);
        }
        $buffer .= Serializer::vectorOfObjects($this->stories);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $maxReadId = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $stories = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStoryItem::class, 'deserialize']);

        return new self(
            $peer,
            $stories,
            $maxReadId
        );
    }
}