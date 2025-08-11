<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageActionRequestedPeerSentMe
 */
final class MessageActionRequestedPeerSentMe extends AbstractMessageAction
{
    public const CONSTRUCTOR_ID = 0x93b31848;
    
    public string $_ = 'messageActionRequestedPeerSentMe';
    
    /**
     * @param int $buttonId
     * @param list<AbstractRequestedPeer> $peers
     */
    public function __construct(
        public readonly int $buttonId,
        public readonly array $peers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->buttonId);
        $buffer .= Serializer::vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $buttonId = Deserializer::int32($stream);
        $peers = Deserializer::vectorOfObjects($stream, [AbstractRequestedPeer::class, 'deserialize']);
        return new self(
            $buttonId,
            $peers
        );
    }
}