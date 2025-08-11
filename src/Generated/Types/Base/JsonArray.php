<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonArray
 */
final class JsonArray extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0xf7444763;
    
    public string $_ = 'jsonArray';
    
    /**
     * @param list<array> $value
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $value = Deserializer::vectorOfObjects($stream, [Deserializer::class, 'deserialize']);
        return new self(
            $value
        );
    }
}