<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.deleteMessages
 */
final class DeleteMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x84c1fd4e;
    
    public string $_ = 'channels.deleteMessages';
    
    public function getMethodName(): string
    {
        return 'channels.deleteMessages';
    }
    
    public function getResponseClass(): string
    {
        return AffectedMessages::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}