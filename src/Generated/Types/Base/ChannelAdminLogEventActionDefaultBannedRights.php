<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionDefaultBannedRights
 */
final class ChannelAdminLogEventActionDefaultBannedRights extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x2df5fc0a;
    
    public string $_ = 'channelAdminLogEventActionDefaultBannedRights';
    
    /**
     * @param ChatBannedRights $prevBannedRights
     * @param ChatBannedRights $newBannedRights
     */
    public function __construct(
        public readonly ChatBannedRights $prevBannedRights,
        public readonly ChatBannedRights $newBannedRights
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevBannedRights->serialize($serializer);
        $buffer .= $this->newBannedRights->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevBannedRights = ChatBannedRights::deserialize($deserializer, $stream);
        $newBannedRights = ChatBannedRights::deserialize($deserializer, $stream);
        return new self(
            $prevBannedRights,
            $newBannedRights
        );
    }
}