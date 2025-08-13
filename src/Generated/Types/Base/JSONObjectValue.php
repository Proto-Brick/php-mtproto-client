<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonObjectValue
 */
final class JSONObjectValue extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc0de1bd9;
    
    public string $predicate = 'jsonObjectValue';
    
    /**
     * @param string $key
     * @param AbstractJSONValue $value
     */
    public function __construct(
        public readonly string $key,
        public readonly AbstractJSONValue $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->key);
        $buffer .= Serializer::serializeJsonValue($this->value);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $key = Deserializer::bytes($stream);
        $value = Deserializer::deserializeJsonValue($stream);

        return new self(
            $key,
            $value
        );
    }
}