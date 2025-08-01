<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonObject
 */
final class JsonObject extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 2579616925;
    
    public string $_ = 'jsonObject';
    
    /**
     * @param list<AbstractJSONObjectValue> $value
     */
    public function __construct(
        public readonly array $value
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->value);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $value = $deserializer->vectorOfObjects($stream, [AbstractJSONObjectValue::class, 'deserialize']);
            return new self(
            $value
        );
    }
}