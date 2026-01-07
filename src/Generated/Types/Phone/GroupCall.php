<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\GroupCallParticipant;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/phone.groupCall
 */
final class GroupCall extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9e727aad;
    
    public string $predicate = 'phone.groupCall';
    
    /**
     * @param AbstractGroupCall $call
     * @param list<GroupCallParticipant> $participants
     * @param string $participantsNextOffset
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractGroupCall $call,
        public readonly array $participants,
        public readonly string $participantsNextOffset,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfObjects($this->participants);
        $buffer .= Serializer::bytes($this->participantsNextOffset);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $call = AbstractGroupCall::deserialize($__payload, $__offset);
        $participants = Deserializer::vectorOfObjects($__payload, $__offset, [GroupCallParticipant::class, 'deserialize']);
        $participantsNextOffset = Deserializer::bytes($__payload, $__offset);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $call,
            $participants,
            $participantsNextOffset,
            $chats,
            $users
        );
    }
}