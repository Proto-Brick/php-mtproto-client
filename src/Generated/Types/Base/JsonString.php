<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonString
 */
final class JsonString extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0xb71e767a;
    
    public string $predicate = 'jsonString';
    
    /**
     * @param string $value
     */
    public function __construct(
        public readonly string $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->value);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $value = Deserializer::bytes($stream);

        return new self(
            $value
        );
    }
}