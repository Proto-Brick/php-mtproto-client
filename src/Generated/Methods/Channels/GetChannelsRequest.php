<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getChannels
 */
final class GetChannelsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa7f6bbb;
    
    public string $_ = 'channels.getChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param list<AbstractInputChannel> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}