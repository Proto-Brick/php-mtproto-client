<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.peerColors
 */
final class PeerColors extends AbstractPeerColors
{
    public const CONSTRUCTOR_ID = 0xf8ed08;
    
    public string $predicate = 'help.peerColors';
    
    /**
     * @param int $hash
     * @param list<PeerColorOption> $colors
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $colors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->colors);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $hash = Deserializer::int32($__payload, $__offset);
        $colors = Deserializer::vectorOfObjects($__payload, $__offset, [PeerColorOption::class, 'deserialize']);

        return new self(
            $hash,
            $colors
        );
    }
}