<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatParticipantsForbidden
 */
final class ChatParticipantsForbidden extends AbstractChatParticipants
{
    public const CONSTRUCTOR_ID = 2271466465;
    
    public string $_ = 'chatParticipantsForbidden';
    
    /**
     * @param int $chatId
     * @param AbstractChatParticipant|null $selfParticipant
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?AbstractChatParticipant $selfParticipant = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->selfParticipant !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->chatId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->selfParticipant->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $chatId = $deserializer->int64($stream);
        $selfParticipant = ($flags & (1 << 0)) ? AbstractChatParticipant::deserialize($deserializer, $stream) : null;
            return new self(
            $chatId,
            $selfParticipant
        );
    }
}