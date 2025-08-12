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
    
    public string $predicate = 'channelAdminLogEventActionDefaultBannedRights';
    
    /**
     * @param ChatBannedRights $prevBannedRights
     * @param ChatBannedRights $newBannedRights
     */
    public function __construct(
        public readonly ChatBannedRights $prevBannedRights,
        public readonly ChatBannedRights $newBannedRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevBannedRights->serialize();
        $buffer .= $this->newBannedRights->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevBannedRights = ChatBannedRights::deserialize($stream);
        $newBannedRights = ChatBannedRights::deserialize($stream);

        return new self(
            $prevBannedRights,
            $newBannedRights
        );
    }
}