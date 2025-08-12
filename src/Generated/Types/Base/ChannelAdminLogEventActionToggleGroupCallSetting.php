<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleGroupCallSetting
 */
final class ChannelAdminLogEventActionToggleGroupCallSetting extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x56d6a247;
    
    public string $predicate = 'channelAdminLogEventActionToggleGroupCallSetting';
    
    /**
     * @param bool $joinMuted
     */
    public function __construct(
        public readonly bool $joinMuted
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->joinMuted ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $joinMuted = (Deserializer::int32($stream) === 0x997275b5);

        return new self(
            $joinMuted
        );
    }
}