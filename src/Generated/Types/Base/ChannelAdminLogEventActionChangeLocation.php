<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeLocation
 */
final class ChannelAdminLogEventActionChangeLocation extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe6b76ae;
    
    public string $_ = 'channelAdminLogEventActionChangeLocation';
    
    /**
     * @param AbstractChannelLocation $prevValue
     * @param AbstractChannelLocation $newValue
     */
    public function __construct(
        public readonly AbstractChannelLocation $prevValue,
        public readonly AbstractChannelLocation $newValue
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
        $prevValue = AbstractChannelLocation::deserialize($deserializer, $stream);
        $newValue = AbstractChannelLocation::deserialize($deserializer, $stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}