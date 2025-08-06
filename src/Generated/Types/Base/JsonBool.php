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
    
    public string $_ = 'jsonBool';
    
    /**
     * @param bool $value
     */
    public function __construct(
        public readonly bool $value
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->value ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $value = ($deserializer->int32($stream) === 0x997275b5);
        return new self(
            $value
        );
    }
}