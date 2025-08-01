<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAffectedHistory;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.deleteTopicHistory
 */
final class DeleteTopicHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 876830509;
    
    public string $_ = 'channels.deleteTopicHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteTopicHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAffectedHistory::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $topMsgId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $topMsgId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->topMsgId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}