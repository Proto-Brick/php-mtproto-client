<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeFragmentSms
 */
final class SentCodeTypeFragmentSms extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xd9565c39;
    
    public string $_ = 'auth.sentCodeTypeFragmentSms';
    
    /**
     * @param string $url
     * @param int $length
     */
    public function __construct(
        public readonly string $url,
        public readonly int $length
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int32($this->length);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $length = $deserializer->int32($stream);
        return new self(
            $url,
            $length
        );
    }
}