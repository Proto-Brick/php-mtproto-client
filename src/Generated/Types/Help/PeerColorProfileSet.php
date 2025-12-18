<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.peerColorProfileSet
 */
final class PeerColorProfileSet extends AbstractPeerColorSet
{
    public const CONSTRUCTOR_ID = 0x767d61eb;
    
    public string $predicate = 'help.peerColorProfileSet';
    
    /**
     * @param list<int> $paletteColors
     * @param list<int> $bgColors
     * @param list<int> $storyColors
     */
    public function __construct(
        public readonly array $paletteColors,
        public readonly array $bgColors,
        public readonly array $storyColors
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfInts($this->paletteColors);
        $buffer .= Serializer::vectorOfInts($this->bgColors);
        $buffer .= Serializer::vectorOfInts($this->storyColors);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $paletteColors = Deserializer::vectorOfInts($__payload, $__offset);
        $bgColors = Deserializer::vectorOfInts($__payload, $__offset);
        $storyColors = Deserializer::vectorOfInts($__payload, $__offset);

        return new self(
            $paletteColors,
            $bgColors,
            $storyColors
        );
    }
}