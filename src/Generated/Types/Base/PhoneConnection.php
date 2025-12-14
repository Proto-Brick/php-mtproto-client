<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneConnection
 */
final class PhoneConnection extends AbstractPhoneConnection
{
    public const CONSTRUCTOR_ID = 0x9cc123c7;
    
    public string $predicate = 'phoneConnection';
    
    /**
     * @param int $id
     * @param string $ip
     * @param string $ipv6
     * @param int $port
     * @param string $peerTag
     * @param true|null $tcp
     */
    public function __construct(
        public readonly int $id,
        public readonly string $ip,
        public readonly string $ipv6,
        public readonly int $port,
        public readonly string $peerTag,
        public readonly ?true $tcp = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->tcp) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->ip);
        $buffer .= Serializer::bytes($this->ipv6);
        $buffer .= Serializer::int32($this->port);
        $buffer .= Serializer::bytes($this->peerTag);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $tcp = (($flags & (1 << 0)) !== 0) ? true : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $ip = Deserializer::bytes($stream);
        $ipv6 = Deserializer::bytes($stream);
        $port = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $peerTag = Deserializer::bytes($stream);

        return new self(
            $id,
            $ip,
            $ipv6,
            $port,
            $peerTag,
            $tcp
        );
    }
}