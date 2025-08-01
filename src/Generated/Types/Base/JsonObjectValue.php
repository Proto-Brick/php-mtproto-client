<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonObjectValue
 */
final class JsonObjectValue extends AbstractJSONObjectValue
{
    public const CONSTRUCTOR_ID = 3235781593;
    
    public string $_ = 'jsonObjectValue';
    
    /**
     * @param string $key
     * @param array $value
     */
    public function __construct(
        public readonly string $key,
        public readonly array $value
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->key);
        $buffer .= (new DataJSON(json_encode($this->value)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $key = $deserializer->bytes($stream);
        $value = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $key,
            $value
        );
    }
}