<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.leaveChannel
 */
final class LeaveChannelRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf836aa95;
    
    public string $_ = 'channels.leaveChannel';
    
    public function getMethodName(): string
    {
        return 'channels.leaveChannel';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     */
    public function __construct(
        public readonly AbstractInputChannel $channel
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}