<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\MessageViews;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getMessagesViews
 */
final class GetMessagesViewsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5784d3e1;
    
    public string $_ = 'messages.getMessagesViews';
    
    public function getMethodName(): string
    {
        return 'messages.getMessagesViews';
    }
    
    public function getResponseClass(): string
    {
        return MessageViews::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param bool $increment
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly bool $increment
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        $buffer .= ($this->increment ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}