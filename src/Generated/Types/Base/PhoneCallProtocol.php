<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCallProtocol
 */
final class PhoneCallProtocol extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfc878fc8;
    
    public string $predicate = 'phoneCallProtocol';
    
    /**
     * @param int $minLayer
     * @param int $maxLayer
     * @param list<string> $libraryVersions
     * @param true|null $udpP2p
     * @param true|null $udpReflector
     */
    public function __construct(
        public readonly int $minLayer,
        public readonly int $maxLayer,
        public readonly array $libraryVersions,
        public readonly ?true $udpP2p = null,
        public readonly ?true $udpReflector = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->udpP2p) $flags |= (1 << 0);
        if ($this->udpReflector) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->minLayer);
        $buffer .= Serializer::int32($this->maxLayer);
        $buffer .= Serializer::vectorOfStrings($this->libraryVersions);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $udpP2p = ($flags & (1 << 0)) ? true : null;
        $udpReflector = ($flags & (1 << 1)) ? true : null;
        $minLayer = Deserializer::int32($stream);
        $maxLayer = Deserializer::int32($stream);
        $libraryVersions = Deserializer::vectorOfStrings($stream);

        return new self(
            $minLayer,
            $maxLayer,
            $libraryVersions,
            $udpP2p,
            $udpReflector
        );
    }
}