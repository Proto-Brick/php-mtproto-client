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
    public const CONSTRUCTOR_ID = 771095562;
    
    public string $_ = 'channelAdminLogEventActionDefaultBannedRights';
    
    /**
     * @param AbstractChatBannedRights $prevBannedRights
     * @param AbstractChatBannedRights $newBannedRights
     */
    public function __construct(
        public readonly AbstractChatBannedRights $prevBannedRights,
        public readonly AbstractChatBannedRights $newBannedRights
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
        $prevBannedRights = AbstractChatBannedRights::deserialize($deserializer, $stream);
        $newBannedRights = AbstractChatBannedRights::deserialize($deserializer, $stream);
            return new self(
            $prevBannedRights,
            $newBannedRights
        );
    }
}