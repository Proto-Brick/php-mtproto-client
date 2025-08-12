<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\ChatBannedRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.editBanned
 */
final class EditBannedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x96e6cd81;
    
    public string $predicate = 'channels.editBanned';
    
    public function getMethodName(): string
    {
        return 'channels.editBanned';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     * @param ChatBannedRights $bannedRights
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant,
        public readonly ChatBannedRights $bannedRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->participant->serialize();
        $buffer .= $this->bannedRights->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}