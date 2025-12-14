<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\GroupCallParticipant;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.groupParticipants
 */
final class GroupParticipants extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf47751b6;
    
    public string $predicate = 'phone.groupParticipants';
    
    /**
     * @param int $count
     * @param list<GroupCallParticipant> $participants
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->participants);
        $buffer .= Serializer::bytes($this->nextOffset);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= Serializer::int32($this->version);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $count = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $participants = Deserializer::vectorOfObjects($stream, [GroupCallParticipant::class, 'deserialize']);
        $nextOffset = Deserializer::bytes($stream);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $version = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

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