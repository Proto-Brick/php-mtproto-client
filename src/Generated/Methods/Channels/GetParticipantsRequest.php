<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChannelParticipantsFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Channels\AbstractChannelParticipants;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getParticipants
 */
final class GetParticipantsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77ced9d0;
    
    public string $_ = 'channels.getParticipants';
    
    public function getMethodName(): string
    {
        return 'channels.getParticipants';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChannelParticipants::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractChannelParticipantsFilter $filter
     * @param int $offset
     * @param int $limit
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractChannelParticipantsFilter $filter,
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}