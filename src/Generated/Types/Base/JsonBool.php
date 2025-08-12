<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonBool
 */
final class JsonBool extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0xc7345e6a;
    
    public string $predicate = 'jsonBool';
    
    /**
     * @param bool $value
     */
    public function __construct(
        public readonly bool $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->value ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $value = (Deserializer::int32($stream) === 0x997275b5);

        return new self(
            $value
        );
    }
}