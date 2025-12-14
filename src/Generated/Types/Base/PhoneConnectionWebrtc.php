<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneConnectionWebrtc
 */
final class PhoneConnectionWebrtc extends AbstractPhoneConnection
{
    public const CONSTRUCTOR_ID = 0x635fe375;
    
    public string $predicate = 'phoneConnectionWebrtc';
    
    /**
     * @param int $id
     * @param string $ip
     * @param string $ipv6
     * @param int $port
     * @param string $username
     * @param string $password
     * @param true|null $turn
     * @param true|null $stun
     */
    public function __construct(
        public readonly int $id,
        public readonly string $ip,
        public readonly string $ipv6,
        public readonly int $port,
        public readonly string $username,
        public readonly string $password,
        public readonly ?true $turn = null,
        public readonly ?true $stun = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->turn) {
            $flags |= (1 << 0);
        }
        if ($this->stun) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->ip);
        $buffer .= Serializer::bytes($this->ipv6);
        $buffer .= Serializer::int32($this->port);
        $buffer .= Serializer::bytes($this->username);
        $buffer .= Serializer::bytes($this->password);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $turn = (($flags & (1 << 0)) !== 0) ? true : null;
        $stun = (($flags & (1 << 1)) !== 0) ? true : null;
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $ip = Deserializer::bytes($stream);
        $ipv6 = Deserializer::bytes($stream);
        $port = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $username = Deserializer::bytes($stream);
        $password = Deserializer::bytes($stream);

        return new self(
            $id,
            $ip,
            $ipv6,
            $port,
            $username,
            $password,
            $turn,
            $stun
        );
    }
}