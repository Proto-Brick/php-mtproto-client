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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->buttonId);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $buttonId = $deserializer->int32($stream);
        $peers = $deserializer->vectorOfObjects($stream, [AbstractRequestedPeer::class, 'deserialize']);
        return new self(
            $buttonId,
            $peers
        );
    }
}