<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AffectedMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.readHistory
 */
final class ReadHistoryRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe306d3a;
    
    public string $predicate = 'messages.readHistory';
    
    public function getMethodName(): string
    {
        return 'messages.readHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedMessages::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $maxId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}