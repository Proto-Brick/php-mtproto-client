<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionToggleInvites
 */
final class ChannelAdminLogEventActionToggleInvites extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x1b7907ae;
    
    public string $_ = 'channelAdminLogEventActionToggleInvites';
    
    /**
     * @param bool $newValue
     */
    public function __construct(
        public readonly bool $newValue
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->newValue ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $newValue = (Deserializer::int32($stream) === 0x997275b5);
        return new self(
            $newValue
        );
    }
}