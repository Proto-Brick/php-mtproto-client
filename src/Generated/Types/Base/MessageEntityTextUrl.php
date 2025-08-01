<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEntityTextUrl
 */
final class MessageEntityTextUrl extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 1990644519;
    
    public string $_ = 'messageEntityTextUrl';
    
    /**
     * @param int $offset
     * @param int $length
     * @param string $url
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly string $url
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->int32($this->length);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $offset = $deserializer->int32($stream);
        $length = $deserializer->int32($stream);
        $url = $deserializer->bytes($stream);
            return new self(
            $offset,
            $length,
            $url
        );
    }
}