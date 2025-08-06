<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.reportSpam
 */
final class ReportSpamRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf44a8315;
    
    public string $_ = 'channels.reportSpam';
    
    public function getMethodName(): string
    {
        return 'channels.reportSpam';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param AbstractInputPeer $participant
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly AbstractInputPeer $participant,
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $this->participant->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}