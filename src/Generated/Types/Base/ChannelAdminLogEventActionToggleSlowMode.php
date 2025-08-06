<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleSlowMode
 */
final class ChannelAdminLogEventActionToggleSlowMode extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x53909779;
    
    public string $_ = 'channelAdminLogEventActionToggleSlowMode';
    
    /**
     * @param int $prevValue
     * @param int $newValue
     */
    public function __construct(
        public readonly int $prevValue,
        public readonly int $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->prevValue);
        $buffer .= $serializer->int32($this->newValue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = $deserializer->int32($stream);
        $newValue = $deserializer->int32($stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}