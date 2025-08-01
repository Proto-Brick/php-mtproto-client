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
    public const CONSTRUCTOR_ID = 1469507456;
    
    public string $_ = 'channelAdminLogEventActionChangePeerColor';
    
    /**
     * @param AbstractPeerColor $prevValue
     * @param AbstractPeerColor $newValue
     */
    public function __construct(
        public readonly AbstractPeerColor $prevValue,
        public readonly AbstractPeerColor $newValue
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
        $prevValue = AbstractPeerColor::deserialize($deserializer, $stream);
        $newValue = AbstractPeerColor::deserialize($deserializer, $stream);
            return new self(
            $prevValue,
            $newValue
        );
    }
}