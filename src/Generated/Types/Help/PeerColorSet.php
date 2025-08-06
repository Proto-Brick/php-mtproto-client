<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.peerColorSet
 */
final class PeerColorSet extends AbstractPeerColorSet
{
    public const CONSTRUCTOR_ID = 0x26219a58;
    
    public string $_ = 'help.peerColorSet';
    
    /**
     * @param list<int> $colors
     */
    public function __construct(
        public readonly array $colors
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfInts($this->colors);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $colors = $deserializer->vectorOfInts($stream);
        return new self(
            $colors
        );
    }
}