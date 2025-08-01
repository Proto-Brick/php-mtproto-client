<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAffectedHistory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.deleteParticipantHistory
 */
final class DeleteParticipantHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 913655003;
    
    public string $_ = 'channels.deleteParticipantHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteParticipantHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAffectedHistory::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $this->participant->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}