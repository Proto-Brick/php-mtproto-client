<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.sendBotRequestedPeer
 */
final class SendBotRequestedPeerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x91b2d060;
    
    public string $predicate = 'messages.sendBotRequestedPeer';
    
    public function getMethodName(): string
    {
        return 'messages.sendBotRequestedPeer';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param int $buttonId
     * @param list<AbstractInputPeer> $requestedPeers
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly int $buttonId,
        public readonly array $requestedPeers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= Serializer::vectorOfObjects($this->requestedPeers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}