<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.readHistory
 */
final class ReadHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcc104937;
    
    public string $_ = 'channels.readHistory';
    
    public function getMethodName(): string
    {
        return 'channels.readHistory';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}