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
    public const CONSTRUCTOR_ID = 0x99c1d49d;
    
    public string $predicate = 'jsonObject';
    
    /**
     * @param list<JSONObjectValue> $value
     */
    public function __construct(
        public readonly array $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->value);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $value = Deserializer::vectorOfObjects($stream, [JSONObjectValue::class, 'deserialize']);

        return new self(
            $value
        );
    }
}