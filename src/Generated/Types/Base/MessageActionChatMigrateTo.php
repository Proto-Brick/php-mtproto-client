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
    public const CONSTRUCTOR_ID = 3775102866;
    
    public string $_ = 'messageActionChatMigrateTo';
    
    /**
     * @param int $channelId
     */
    public function __construct(
        public readonly int $channelId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
            return new self(
            $channelId
        );
    }
}