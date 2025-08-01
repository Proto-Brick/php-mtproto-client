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
    public const CONSTRUCTOR_ID = 16313608;
    
    public string $_ = 'help.peerColors';
    
    /**
     * @param int $hash
     * @param list<AbstractPeerColorOption> $colors
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $colors
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->colors);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $colors = $deserializer->vectorOfObjects($stream, [AbstractPeerColorOption::class, 'deserialize']);
            return new self(
            $hash,
            $colors
        );
    }
}