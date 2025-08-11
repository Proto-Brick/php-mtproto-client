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
    
    public string $_ = 'jsonObjectValue';
    
    /**
     * @param string $key
     * @param array $value
     */
    public function __construct(
        public readonly string $key,
        public readonly array $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->key);
        $buffer .= (new DataJSON(json_encode($this->value, JSON_FORCE_OBJECT)))->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $key = Deserializer::bytes($stream);
        $value = Deserializer::deserializeJsonValue($stream);
        return new self(
            $key,
            $value
        );
    }
}