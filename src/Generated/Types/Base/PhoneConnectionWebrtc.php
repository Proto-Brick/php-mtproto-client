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
    public const CONSTRUCTOR_ID = 1667228533;
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->turn) $flags |= (1 << 0);
        if ($this->stun) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->bytes($this->ip);
        $buffer .= $serializer->bytes($this->ipv6);
        $buffer .= $serializer->int32($this->port);
        $buffer .= $serializer->bytes($this->username);
        $buffer .= $serializer->bytes($this->password);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $turn = ($flags & (1 << 0)) ? true : null;
        $stun = ($flags & (1 << 1)) ? true : null;
        $id = $deserializer->int64($stream);
        $ip = $deserializer->bytes($stream);
        $ipv6 = $deserializer->bytes($stream);
        $port = $deserializer->int32($stream);
        $username = $deserializer->bytes($stream);
        $password = $deserializer->bytes($stream);
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