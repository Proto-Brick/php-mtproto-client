<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dcOption
 */
final class DcOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x18b7a10d;
    
    public string $_ = 'dcOption';
    
    /**
     * @param int $id
     * @param string $ipAddress
     * @param int $port
     * @param bool|null $ipv6
     * @param bool|null $mediaOnly
     * @param bool|null $tcpoOnly
     * @param bool|null $cdn
     * @param bool|null $static
     * @param bool|null $thisPortOnly
     * @param string|null $secret
     */
    public function __construct(
        public readonly int $id,
        public readonly string $ipAddress,
        public readonly int $port,
        public readonly ?bool $ipv6 = null,
        public readonly ?bool $mediaOnly = null,
        public readonly ?bool $tcpoOnly = null,
        public readonly ?bool $cdn = null,
        public readonly ?bool $static = null,
        public readonly ?bool $thisPortOnly = null,
        public readonly ?string $secret = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ipv6) $flags |= (1 << 0);
        if ($this->mediaOnly) $flags |= (1 << 1);
        if ($this->tcpoOnly) $flags |= (1 << 2);
        if ($this->cdn) $flags |= (1 << 3);
        if ($this->static) $flags |= (1 << 4);
        if ($this->thisPortOnly) $flags |= (1 << 5);
        if ($this->secret !== null) $flags |= (1 << 10);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->ipAddress);
        $buffer .= $serializer->int32($this->port);
        if ($flags & (1 << 10)) {
            $buffer .= $serializer->bytes($this->secret);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $ipv6 = ($flags & (1 << 0)) ? true : null;
        $mediaOnly = ($flags & (1 << 1)) ? true : null;
        $tcpoOnly = ($flags & (1 << 2)) ? true : null;
        $cdn = ($flags & (1 << 3)) ? true : null;
        $static = ($flags & (1 << 4)) ? true : null;
        $thisPortOnly = ($flags & (1 << 5)) ? true : null;
        $id = $deserializer->int32($stream);
        $ipAddress = $deserializer->bytes($stream);
        $port = $deserializer->int32($stream);
        $secret = ($flags & (1 << 10)) ? $deserializer->bytes($stream) : null;
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