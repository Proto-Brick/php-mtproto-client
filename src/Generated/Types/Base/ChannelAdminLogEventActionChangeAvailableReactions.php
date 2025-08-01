<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/channelAdminLogEventActionChangeAvailableReactions
 */
final class ChannelAdminLogEventActionChangeAvailableReactions extends AbstractChannelAdminLogEventAction
{
    public const CONSTRUCTOR_ID = 3192786680;
    
    public string $_ = 'channelAdminLogEventActionChangeAvailableReactions';
    
    /**
     * @param AbstractChatReactions $prevValue
     * @param AbstractChatReactions $newValue
     */
    public function __construct(
        public readonly AbstractChatReactions $prevValue,
        public readonly AbstractChatReactions $newValue
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
        $prevValue = AbstractChatReactions::deserialize($deserializer, $stream);
        $newValue = AbstractChatReactions::deserialize($deserializer, $stream);
            return new self(
            $prevValue,
            $newValue
        );
    }
}