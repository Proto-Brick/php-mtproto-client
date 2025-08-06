<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeEmojiStatus
 */
final class ChannelAdminLogEventActionChangeEmojiStatus extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 0x3ea9feb1;
    
    public string $_ = 'channelAdminLogEventActionChangeEmojiStatus';
    
    /**
     * @param AbstractEmojiStatus $prevValue
     * @param AbstractEmojiStatus $newValue
     */
    public function __construct(
        public readonly AbstractEmojiStatus $prevValue,
        public readonly AbstractEmojiStatus $newValue
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
        $prevValue = AbstractEmojiStatus::deserialize($deserializer, $stream);
        $newValue = AbstractEmojiStatus::deserialize($deserializer, $stream);
        return new self(
            $prevValue,
            $newValue
        );
    }
}