<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAffectedMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.readHistory
 */
final class ReadHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 238054714;
    
    public string $_ = 'messages.readHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAffectedMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}