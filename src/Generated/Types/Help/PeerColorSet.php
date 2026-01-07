<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.peerColorSet
 */
final class PeerColorSet extends AbstractPeerColorSet
{
    public const CONSTRUCTOR_ID = 0x26219a58;
    
    public string $predicate = 'help.peerColorSet';
    
    /**
     * @param list<int> $colors
     */
    public function __construct(
        public readonly array $colors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->colors);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $colors = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $colors
        );
    }
}