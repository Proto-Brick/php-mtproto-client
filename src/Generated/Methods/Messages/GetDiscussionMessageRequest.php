<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\DiscussionMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDiscussionMessage
 */
final class GetDiscussionMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x446972fd;
    
    public string $predicate = 'messages.getDiscussionMessage';
    
    public function getMethodName(): string
    {
        return 'messages.getDiscussionMessage';
    }
    
    public function getResponseClass(): string
    {
        return DiscussionMessage::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}