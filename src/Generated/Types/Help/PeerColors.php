<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = Deserializer::int32($stream);
        $colors = Deserializer::vectorOfObjects($stream, [PeerColorOption::class, 'deserialize']);

        return new self(
            $hash,
            $colors
        );
    }
}