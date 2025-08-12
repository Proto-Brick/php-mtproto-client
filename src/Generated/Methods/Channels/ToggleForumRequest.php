<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.toggleForum
 */
final class ToggleForumRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa4298b29;
    
    public string $predicate = 'channels.toggleForum';
    
    public function getMethodName(): string
    {
        return 'channels.toggleForum';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param bool $enabled
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly bool $enabled
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= ($this->enabled ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}