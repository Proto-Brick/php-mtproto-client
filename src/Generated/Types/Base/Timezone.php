<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/timezone
 */
final class Timezone extends AbstractTimezone
{
    public const CONSTRUCTOR_ID = 4287793653;
    
    public string $_ = 'timezone';
    
    /**
     * @param string $id
     * @param string $name
     * @param int $utcOffset
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int $utcOffset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->id);
        $buffer .= $serializer->bytes($this->name);
        $buffer .= $serializer->int32($this->utcOffset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = $deserializer->bytes($stream);
        $name = $deserializer->bytes($stream);
        $utcOffset = $deserializer->int32($stream);
            return new self(
            $id,
            $name,
            $utcOffset
        );
    }
}