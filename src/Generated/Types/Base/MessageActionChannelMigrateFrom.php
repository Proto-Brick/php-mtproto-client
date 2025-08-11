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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::int64($this->chatId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $title = Deserializer::bytes($stream);
        $chatId = Deserializer::int64($stream);
        return new self(
            $title,
            $chatId
        );
    }
}