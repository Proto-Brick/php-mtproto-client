<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Channels\ChannelParticipant;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getParticipant
 */
final class GetParticipantRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa0ab6cc6;
    
    public string $predicate = 'channels.getParticipant';
    
    public function getMethodName(): string
    {
        return 'channels.getParticipant';
    }
    
    public function getResponseClass(): string
    {
        return ChannelParticipant::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->participant->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}