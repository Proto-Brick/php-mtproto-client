<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionUpdatePinned
 */
final class ChannelAdminLogEventActionUpdatePinned extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0xe9e82c18;
    
    public string $_ = 'channelAdminLogEventActionUpdatePinned';
    
    /**
     * @param AbstractMessage $message
     */
    public function __construct(
        public readonly AbstractMessage $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->message->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $message = AbstractMessage::deserialize($stream);
        return new self(
            $message
        );
    }
}