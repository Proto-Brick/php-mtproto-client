<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/dcOption
 */
final class DcOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x18b7a10d;
    
    public string $predicate = 'dcOption';
    
    /**
     * @param int $id
     * @param string $ipAddress
     * @param int $port
     * @param true|null $ipv6
     * @param true|null $mediaOnly
     * @param true|null $tcpoOnly
     * @param true|null $cdn
     * @param true|null $static
     * @param true|null $thisPortOnly
     * @param string|null $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly string $ipAddress,
        public readonly int $port,
        public readonly ?true $ipv6 = null,
        public readonly ?true $mediaOnly = null,
        public readonly ?true $tcpoOnly = null,
        public readonly ?true $cdn = null,
        public readonly ?true $static = null,
        public readonly ?true $thisPortOnly = null,
        public readonly ?string $secret = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ipv6) {
            $flags |= (1 << 0);
        }
        if ($this->mediaOnly) {
            $flags |= (1 << 1);
        }
        if ($this->tcpoOnly) {
            $flags |= (1 << 2);
        }
        if ($this->cdn) {
            $flags |= (1 << 3);
        }
        if ($this->static) {
            $flags |= (1 << 4);
        }
        if ($this->thisPortOnly) {
            $flags |= (1 << 5);
        }
        if ($this->secret !== null) {
            $flags |= (1 << 10);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->ipAddress);
        $buffer .= Serializer::int32($this->port);
        if ($flags & (1 << 10)) {
            $buffer .= Serializer::bytes($this->secret);
        }
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
        $ipv6 = (($flags & (1 << 0)) !== 0) ? true : null;
        $mediaOnly = (($flags & (1 << 1)) !== 0) ? true : null;
        $tcpoOnly = (($flags & (1 << 2)) !== 0) ? true : null;
        $cdn = (($flags & (1 << 3)) !== 0) ? true : null;
        $static = (($flags & (1 << 4)) !== 0) ? true : null;
        $thisPortOnly = (($flags & (1 << 5)) !== 0) ? true : null;
        $id = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $ipAddress = Deserializer::bytes($stream);
        $port = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $secret = (($flags & (1 << 10)) !== 0) ? Deserializer::bytes($stream) : null;

        return new self(
            $id,
            $ipAddress,
            $port,
            $ipv6,
            $mediaOnly,
            $tcpoOnly,
            $cdn,
            $static,
            $thisPortOnly,
            $secret
        );
    }
}