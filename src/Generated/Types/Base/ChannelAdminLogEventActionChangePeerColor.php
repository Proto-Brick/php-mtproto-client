<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangePeerColor
 */
final class ChannelAdminLogEventActionChangePeerColor extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x5796e780;
    
    public string $_ = 'channelAdminLogEventActionChangePeerColor';
    
    /**
     * @param PeerColor $prevValue
     * @param PeerColor $newValue
     */
    public function __construct(
        public readonly PeerColor $prevValue,
        public readonly PeerColor $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize($serializer);
        $buffer .= $this->newValue->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = PeerColor::deserialize($deserializer, $stream);
        $newValue = PeerColor::deserialize($deserializer, $stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}