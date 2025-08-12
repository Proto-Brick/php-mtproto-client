<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatParticipants
 */
final class ChatParticipants extends AbstractChatParticipants
{
    public const CONSTRUCTOR_ID = 0x3cbc93f8;
    
    public string $predicate = 'chatParticipants';
    
    /**
     * @param int $chatId
     * @param list<AbstractChatParticipant> $participants
     * @param int $version
     */
    public function __construct(
        public readonly int $chatId,
        public readonly array $participants,
        public readonly int $version
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->chatId);
        $buffer .= Serializer::vectorOfObjects($this->participants);
        $buffer .= Serializer::int32($this->version);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $chatId = Deserializer::int64($stream);
        $participants = Deserializer::vectorOfObjects($stream, [AbstractChatParticipant::class, 'deserialize']);
        $version = Deserializer::int32($stream);

        return new self(
            $chatId,
            $participants,
            $version
        );
    }
}