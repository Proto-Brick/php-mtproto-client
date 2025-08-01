<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.groupCallStreamRtmpUrl
 */
final class GroupCallStreamRtmpUrl extends AbstractGroupCallStreamRtmpUrl
{
    public const CONSTRUCTOR_ID = 767505458;
    
    public string $_ = 'phone.groupCallStreamRtmpUrl';
    
    /**
     * @param string $url
     * @param string $key
     */
    public function __construct(
        public readonly string $url,
        public readonly string $key
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->bytes($this->key);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $key = $deserializer->bytes($stream);
            return new self(
            $url,
            $key
        );
    }
}