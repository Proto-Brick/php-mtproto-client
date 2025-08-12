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
    public const CONSTRUCTOR_ID = 0xa02a982e;
    
    public string $predicate = 'updateBotDeleteBusinessMessage';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->connectionId);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->messages);
        $buffer .= Serializer::int32($this->qts);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $connectionId = Deserializer::bytes($stream);
        $peer = AbstractPeer::deserialize($stream);
        $messages = Deserializer::vectorOfInts($stream);
        $qts = Deserializer::int32($stream);

        return new self(
            $connectionId,
            $peer,
            $messages,
            $qts
        );
    }
}