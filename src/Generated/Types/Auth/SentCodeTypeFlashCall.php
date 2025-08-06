<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFlashCall
 */
final class SentCodeTypeFlashCall extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xab03c6d9;
    
    public string $_ = 'auth.sentCodeTypeFlashCall';
    
    /**
     * @param string $pattern
     */
    public function __construct(
        public readonly string $pattern
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->pattern);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pattern = $deserializer->bytes($stream);
        return new self(
            $pattern
        );
    }
}