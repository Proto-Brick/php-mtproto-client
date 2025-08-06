<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageMediaDice
 */
final class MessageMediaDice extends AbstractMessageMedia
{
    public const CONSTRUCTOR_ID = 0x3f7ee58b;
    
    public string $_ = 'messageMediaDice';
    
    /**
     * @param int $value
     * @param string $emoticon
     */
    public function __construct(
        public readonly int $value,
        public readonly string $emoticon
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->value);
        $buffer .= $serializer->bytes($this->emoticon);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $value = $deserializer->int32($stream);
        $emoticon = $deserializer->bytes($stream);
        return new self(
            $value,
            $emoticon
        );
    }
}