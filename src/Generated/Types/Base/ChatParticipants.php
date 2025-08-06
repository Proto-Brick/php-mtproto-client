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
    
    public string $_ = 'chatParticipants';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->chatId);
        $buffer .= $serializer->vectorOfObjects($this->participants);
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $chatId = $deserializer->int64($stream);
        $participants = $deserializer->vectorOfObjects($stream, [AbstractChatParticipant::class, 'deserialize']);
        $version = $deserializer->int32($stream);
        return new self(
            $chatId,
            $participants,
            $version
        );
    }
}