<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGroupCallParticipant;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.groupParticipants
 */
final class GroupParticipants extends AbstractGroupParticipants
{
    public const CONSTRUCTOR_ID = 4101460406;
    
    public string $_ = 'phone.groupParticipants';
    
    /**
     * @param int $count
     * @param list<AbstractGroupCallParticipant> $participants
     * @param string $nextOffset
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param int $version
     */
    public function __construct(
        public readonly int $count,
        public readonly array $participants,
        public readonly string $nextOffset,
        public readonly array $chats,
        public readonly array $users,
        public readonly int $version
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->participants);
        $buffer .= $serializer->bytes($this->nextOffset);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $serializer->int32($this->version);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $count = $deserializer->int32($stream);
        $participants = $deserializer->vectorOfObjects($stream, [AbstractGroupCallParticipant::class, 'deserialize']);
        $nextOffset = $deserializer->bytes($stream);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $version = $deserializer->int32($stream);
            return new self(
            $count,
            $participants,
            $nextOffset,
            $chats,
            $users,
            $version
        );
    }
}