<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.peerColorProfileSet
 */
final class PeerColorProfileSet extends AbstractPeerColorSet
{
    public const CONSTRUCTOR_ID = 0x767d61eb;
    
    public string $_ = 'help.peerColorProfileSet';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfInts($this->paletteColors);
        $buffer .= $serializer->vectorOfInts($this->bgColors);
        $buffer .= $serializer->vectorOfInts($this->storyColors);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $paletteColors = $deserializer->vectorOfInts($stream);
        $bgColors = $deserializer->vectorOfInts($stream);
        $storyColors = $deserializer->vectorOfInts($stream);
        return new self(
            $paletteColors,
            $bgColors,
            $storyColors
        );
    }
}