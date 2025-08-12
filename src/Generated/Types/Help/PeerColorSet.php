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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $colors = Deserializer::vectorOfInts($stream);

        return new self(
            $colors
        );
    }
}