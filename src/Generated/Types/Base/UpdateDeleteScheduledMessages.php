<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDeleteScheduledMessages
 */
final class UpdateDeleteScheduledMessages extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf2a71983;
    
    public string $_ = 'updateDeleteScheduledMessages';
    
    /**
     * @param AbstractPeer $peer
     * @param list<int> $messages
     * @param list<int>|null $sentMessages
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $messages,
        public readonly ?array $sentMessages = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sentMessages !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->messages);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfInts($this->sentMessages);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $messages = $deserializer->vectorOfInts($stream);
        $sentMessages = ($flags & (1 << 0)) ? $deserializer->vectorOfInts($stream) : null;
        return new self(
            $peer,
            $messages,
            $sentMessages
        );
    }
}