<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaAreaChannelPost
 */
final class InputMediaAreaChannelPost extends AbstractMediaArea
{
    public const CONSTRUCTOR_ID = 577893055;
    
    public string $_ = 'inputMediaAreaChannelPost';
    
    /**
     * @param AbstractMediaAreaCoordinates $coordinates
     * @param AbstractInputChannel $channel
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractMediaAreaCoordinates $coordinates,
        public readonly AbstractInputChannel $channel,
        public readonly int $msgId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->coordinates->serialize($serializer);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $coordinates = AbstractMediaAreaCoordinates::deserialize($deserializer, $stream);
        $channel = AbstractInputChannel::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
            return new self(
            $coordinates,
            $channel,
            $msgId
        );
    }
}