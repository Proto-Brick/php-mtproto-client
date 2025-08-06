<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageEntityPre
 */
final class MessageEntityPre extends AbstractMessageEntity
{
    public const CONSTRUCTOR_ID = 0x73924be0;
    
    public string $_ = 'messageEntityPre';
    
    /**
     * @param int $offset
     * @param int $length
     * @param string $language
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $length,
        public readonly string $language
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->int32($this->length);
        $buffer .= $serializer->bytes($this->language);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $offset = $deserializer->int32($stream);
        $length = $deserializer->int32($stream);
        $language = $deserializer->bytes($stream);
        return new self(
            $offset,
            $length,
            $language
        );
    }
}