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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->pattern);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $pattern = Deserializer::bytes($stream);
        return new self(
            $pattern
        );
    }
}