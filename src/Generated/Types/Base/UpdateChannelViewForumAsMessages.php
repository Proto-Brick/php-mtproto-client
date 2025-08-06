<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateChannelViewForumAsMessages
 */
final class UpdateChannelViewForumAsMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x7b68920;
    
    public string $_ = 'updateChannelViewForumAsMessages';
    
    /**
     * @param int $channelId
     * @param bool $enabled
     */
    public function __construct(
        public readonly int $channelId,
        public readonly bool $enabled
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->channelId);
        $buffer .= ($this->enabled ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $channelId = $deserializer->int64($stream);
        $enabled = ($deserializer->int32($stream) === 0x997275b5);
        return new self(
            $channelId,
            $enabled
        );
    }
}