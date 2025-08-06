<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChannel;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.setDiscussionGroup
 */
final class SetDiscussionGroupRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x40582bb2;
    
    public string $_ = 'channels.setDiscussionGroup';
    
    public function getMethodName(): string
    {
        return 'channels.setDiscussionGroup';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $broadcast
     * @param AbstractInputChannel $group
     */
    public function __construct(
        public readonly AbstractInputChannel $broadcast,
        public readonly AbstractInputChannel $group
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->broadcast->serialize($serializer);
        $buffer .= $this->group->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}