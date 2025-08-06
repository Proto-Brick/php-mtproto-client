<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSms
 */
final class SentCodeTypeSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xc000bba2;
    
    public string $_ = 'auth.sentCodeTypeSms';
    
    /**
     * @param int $length
     */
    public function __construct(
        public readonly int $length
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->length);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $length = $deserializer->int32($stream);
        return new self(
            $length
        );
    }
}