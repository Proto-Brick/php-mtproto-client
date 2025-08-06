<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/timezone
 */
final class Timezone extends TlObject
{
    public const CONSTRUCTOR_ID = 0xff9289f5;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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