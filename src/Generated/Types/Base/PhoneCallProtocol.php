<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
        if ($this->udpP2p) {
            $flags |= (1 << 0);
        }
        if ($this->udpReflector) {
            $flags |= (1 << 1);
        }
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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $udpP2p = (($flags & (1 << 0)) !== 0) ? true : null;
        $udpReflector = (($flags & (1 << 1)) !== 0) ? true : null;
        $minLayer = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $maxLayer = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
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