<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChannelMigrateFrom
 */
final class MessageActionChannelMigrateFrom extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xea3948e9;
    
    public string $_ = 'messageActionChannelMigrateFrom';
    
    /**
     * @param string $title
     * @param int $chatId
     */
    public function __construct(
        public readonly string $title,
        public readonly int $chatId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->int64($this->chatId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $chatId = $deserializer->int64($stream);
        return new self(
            $title,
            $chatId
        );
    }
}