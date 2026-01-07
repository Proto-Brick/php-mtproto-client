<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/starsTransactionPeer
 */
final class StarsTransactionPeer extends AbstractStarsTransactionPeer
{
    public const CONSTRUCTOR_ID = 0xd80da15d;
    
    public string $predicate = 'starsTransactionPeer';
    
    /**
     * @param AbstractPeer $peer
     */
    public function __construct(
        public readonly AbstractPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $peer = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $peer
        );
    }
}