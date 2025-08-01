<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleAntiSpam
 */
final class ChannelAdminLogEventActionToggleAntiSpam extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 1693675004;
    
    public string $_ = 'channelAdminLogEventActionToggleAntiSpam';
    
    /**
     * @param bool $newValue
     */
    public function __construct(
        public readonly bool $newValue
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->newValue ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $newValue = ($deserializer->int32($stream) === 0x997275b5);
            return new self(
            $newValue
        );
    }
}