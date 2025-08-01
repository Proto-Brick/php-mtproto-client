<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendQuickReplyMessages
 */
final class SendQuickReplyMessagesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1819610593;
    
    public string $_ = 'messages.sendQuickReplyMessages';
    
    public function getMethodName(): string
    {
        return 'messages.sendQuickReplyMessages';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $shortcutId
     * @param list<int> $id
     * @param list<int> $randomId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $shortcutId,
        public readonly array $id,
        public readonly array $randomId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->shortcutId);
        $buffer .= $serializer->vectorOfInts($this->id);
        $buffer .= $serializer->vectorOfLongs($this->randomId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}