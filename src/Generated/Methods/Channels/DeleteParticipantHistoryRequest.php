<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedHistory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.deleteParticipantHistory
 */
final class DeleteParticipantHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x367544db;
    
    public string $predicate = 'channels.deleteParticipantHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteParticipantHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
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