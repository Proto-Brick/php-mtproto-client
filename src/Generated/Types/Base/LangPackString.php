<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackString
 */
final class LangPackString extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 3402727926;
    
    public string $_ = 'langPackString';
    
    /**
     * @param string $key
     * @param string $value
     */
    public function __construct(
        public readonly string $key,
        public readonly string $value
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->key);
        $buffer .= $serializer->bytes($this->value);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $key = $deserializer->bytes($stream);
        $value = $deserializer->bytes($stream);
            return new self(
            $key,
            $value
        );
    }
}