<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/langPackStringDeleted
 */
final class LangPackStringDeleted extends AbstractLangPackString
{
    public const CONSTRUCTOR_ID = 695856818;
    
    public string $_ = 'langPackStringDeleted';
    
    /**
     * @param string $key
     */
    public function __construct(
        public readonly string $key
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->key);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $key = $deserializer->bytes($stream);
            return new self(
            $key
        );
    }
}