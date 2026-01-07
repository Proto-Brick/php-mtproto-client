<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/groupCallDonor
 */
final class GroupCallDonor extends TlObject
{
    public const CONSTRUCTOR_ID = 0xee430c85;
    
    public string $predicate = 'groupCallDonor';
    
    /**
     * @param int $stars
     * @param true|null $top
     * @param true|null $my
     * @param AbstractPeer|null $peerId
     */
    public function __construct(
        public readonly int $stars,
        public readonly ?true $top = null,
        public readonly ?true $my = null,
        public readonly ?AbstractPeer $peerId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->top) {
            $flags |= (1 << 0);
        }
        if ($this->my) {
            $flags |= (1 << 1);
        }
        if ($this->peerId !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= $this->peerId->serialize();
        }
        $buffer .= Serializer::int64($this->stars);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $top = (($flags & (1 << 0)) !== 0) ? true : null;
        $my = (($flags & (1 << 1)) !== 0) ? true : null;
        $peerId = (($flags & (1 << 3)) !== 0) ? AbstractPeer::deserialize($__payload, $__offset) : null;
        $stars = Deserializer::int64($__payload, $__offset);

        return new self(
            $stars,
            $top,
            $my,
            $peerId
        );
    }
}