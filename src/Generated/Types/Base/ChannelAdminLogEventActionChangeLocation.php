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
    
    public string $predicate = 'channelAdminLogEventActionChangeLocation';
    
    /**
     * @param AbstractChannelLocation $prevValue
     * @param AbstractChannelLocation $newValue
     */
    public function __construct(
        public readonly AbstractChannelLocation $prevValue,
        public readonly AbstractChannelLocation $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->prevValue->serialize();
        $buffer .= $this->newValue->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $prevValue = AbstractChannelLocation::deserialize($stream);
        $newValue = AbstractChannelLocation::deserialize($stream);

        return new self(
            $prevValue,
            $newValue
        );
    }
}