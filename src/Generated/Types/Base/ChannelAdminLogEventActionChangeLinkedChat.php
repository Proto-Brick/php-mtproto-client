<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeLinkedChat
 */
final class ChannelAdminLogEventActionChangeLinkedChat extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x50c7ac8;
    
    public string $_ = 'channelAdminLogEventActionChangeLinkedChat';
    
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
        $buffer .= $serializer->int64($this->prevValue);
        $buffer .= $serializer->int64($this->newValue);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $prevValue = $deserializer->int64($stream);
        $newValue = $deserializer->int64($stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}