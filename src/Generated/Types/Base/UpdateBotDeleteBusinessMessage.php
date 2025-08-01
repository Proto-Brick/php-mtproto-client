<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotDeleteBusinessMessage
 */
final class UpdateBotDeleteBusinessMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2687146030;
    
    public string $_ = 'updateBotDeleteBusinessMessage';
    
    /**
     * @param string $connectionId
     * @param AbstractPeer $peer
     * @param list<int> $messages
     * @param int $qts
     */
    public function __construct(
        public readonly string $connectionId,
        public readonly AbstractPeer $peer,
        public readonly array $messages,
        public readonly int $qts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->connectionId);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->messages);
        $buffer .= $serializer->int32($this->qts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $connectionId = $deserializer->bytes($stream);
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $messages = $deserializer->vectorOfInts($stream);
        $qts = $deserializer->int32($stream);
            return new self(
            $connectionId,
            $peer,
            $messages,
            $qts
        );
    }
}