<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionChatMigrateTo
 */
final class MessageActionChatMigrateTo extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0xe1037f92;
    
    public string $_ = 'messageActionChatMigrateTo';
    
    /**
     * @param int $channelId
     */
    public function __construct(
        public readonly int $channelId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->channelId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $channelId = Deserializer::int64($stream);
        return new self(
            $channelId
        );
    }
}