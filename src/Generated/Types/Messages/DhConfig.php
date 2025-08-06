<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.dhConfig
 */
final class DhConfig extends AbstractDhConfig
{
    public const CONSTRUCTOR_ID = 0x2c221edd;
    
    public string $_ = 'messages.dhConfig';
    
    /**
     * @param int $g
     * @param string $p
     * @param int $version
     * @param string $random
     */
    public function __construct(
        public readonly int $g,
        public readonly string $p,
        public readonly int $version,
        public readonly string $random
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->g);
        $buffer .= $serializer->bytes($this->p);
        $buffer .= $serializer->int32($this->version);
        $buffer .= $serializer->bytes($this->random);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $g = $deserializer->int32($stream);
        $p = $deserializer->bytes($stream);
        $version = $deserializer->int32($stream);
        $random = $deserializer->bytes($stream);
        return new self(
            $g,
            $p,
            $version,
            $random
        );
    }
}