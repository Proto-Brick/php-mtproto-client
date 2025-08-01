<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneCallProtocol
 */
final class PhoneCallProtocol extends AbstractPhoneCallProtocol
{
    public const CONSTRUCTOR_ID = 4236742600;
    
    public string $_ = 'phoneCallProtocol';
    
    /**
     * @param int $minLayer
     * @param int $maxLayer
     * @param list<string> $libraryVersions
     * @param bool|null $udpP2p
     * @param bool|null $udpReflector
     */
    public function __construct(
        public readonly int $minLayer,
        public readonly int $maxLayer,
        public readonly array $libraryVersions,
        public readonly ?bool $udpP2p = null,
        public readonly ?bool $udpReflector = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->udpP2p) $flags |= (1 << 0);
        if ($this->udpReflector) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->minLayer);
        $buffer .= $serializer->int32($this->maxLayer);
        $buffer .= $serializer->vectorOfStrings($this->libraryVersions);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $udpP2p = ($flags & (1 << 0)) ? true : null;
        $udpReflector = ($flags & (1 << 1)) ? true : null;
        $minLayer = $deserializer->int32($stream);
        $maxLayer = $deserializer->int32($stream);
        $libraryVersions = $deserializer->vectorOfStrings($stream);
            return new self(
            $minLayer,
            $maxLayer,
            $libraryVersions,
            $udpP2p,
            $udpReflector
        );
    }
}