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
    public const CONSTRUCTOR_ID = 0x8763d3e1;
    
    public string $_ = 'chatParticipantsForbidden';
    
    /**
     * @param int $chatId
     * @param AbstractChatParticipant|null $selfParticipant
     */
    public function __construct(
        public readonly int $chatId,
        public readonly ?AbstractChatParticipant $selfParticipant = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->selfParticipant !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->chatId);
        if ($flags & (1 << 0)) {
            $buffer .= $this->selfParticipant->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $chatId = Deserializer::int64($stream);
        $selfParticipant = ($flags & (1 << 0)) ? AbstractChatParticipant::deserialize($stream) : null;
        return new self(
            $chatId,
            $selfParticipant
        );
    }
}