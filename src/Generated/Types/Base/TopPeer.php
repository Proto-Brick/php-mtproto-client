<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/topPeer
 */
final class TopPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xedcdc05b;
    
    public string $predicate = 'topPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param float $rating
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly float $rating
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= pack('d', $this->rating);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $rating = Deserializer::double($__payload, $__offset);

        return new self(
            $peer,
            $rating
        );
    }
}