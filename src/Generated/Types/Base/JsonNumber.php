<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/jsonNumber
 */
final class JsonNumber extends AbstractJSONValue
{
    public const CONSTRUCTOR_ID = 0x2be0dfa4;
    
    public string $predicate = 'jsonNumber';
    
    /**
     * @param float $value
     */
    public function __construct(
        public readonly float $value
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->value);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $value = Deserializer::double($stream);

        return new self(
            $value
        );
    }
}