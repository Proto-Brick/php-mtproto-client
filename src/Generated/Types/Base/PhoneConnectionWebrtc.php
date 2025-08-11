<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phoneConnectionWebrtc
 */
final class PhoneConnectionWebrtc extends AbstractPhoneConnection
{
    public const CONSTRUCTOR_ID = 0x635fe375;
    
    public string $_ = 'phoneConnectionWebrtc';
    
    /**
     * @param int $id
     * @param string $ip
     * @param string $ipv6
     * @param int $port
     * @param string $username
     * @param string $password
     * @param bool|null $turn
     * @param bool|null $stun
     */
    public function __construct(
        public readonly int $id,
        public readonly string $ip,
        public readonly string $ipv6,
        public readonly int $port,
        public readonly string $username,
        public readonly string $password,
        public readonly ?bool $turn = null,
        public readonly ?bool $stun = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->turn) $flags |= (1 << 0);
        if ($this->stun) $flags |= (1 << 1);
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $turn = ($flags & (1 << 0)) ? true : null;
        $stun = ($flags & (1 << 1)) ? true : null;
        $id = Deserializer::int64($stream);
        $ip = Deserializer::bytes($stream);
        $ipv6 = Deserializer::bytes($stream);
        $port = Deserializer::int32($stream);
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