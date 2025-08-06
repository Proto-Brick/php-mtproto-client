<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateMessageReactions
 */
final class UpdateMessageReactions extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x5e1b3cb8;
    
    public string $_ = 'updateMessageReactions';
    
    /**
     * @param AbstractPeer $peer
     * @param int $msgId
     * @param MessageReactions $reactions
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly int $msgId,
        public readonly MessageReactions $reactions,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->topMsgId);
        }
        $buffer .= $this->reactions->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $msgId = $deserializer->int32($stream);
        $topMsgId = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $reactions = MessageReactions::deserialize($deserializer, $stream);
        return new self(
            $peer,
            $msgId,
            $reactions,
            $topMsgId
        );
    }
}