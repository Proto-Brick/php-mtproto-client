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
    
    public string $predicate = 'timezone';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        $buffer .= Serializer::bytes($this->name);
        $buffer .= Serializer::int32($this->utcOffset);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $id = Deserializer::bytes($stream);
        $name = Deserializer::bytes($stream);
        $utcOffset = Deserializer::int32($stream);

        return new self(
            $id,
            $name,
            $utcOffset
        );
    }
}