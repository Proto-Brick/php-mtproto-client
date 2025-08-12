<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeApp
 */
final class SentCodeTypeApp extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0x3dbb5986;
    
    public string $predicate = 'auth.sentCodeTypeApp';
    
    /**
     * @param int $length
     */
    public function __construct(
        public readonly int $length
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->length);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $length = Deserializer::int32($stream);

        return new self(
            $length
        );
    }
}