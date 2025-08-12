<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\GroupCallParticipant;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $call = AbstractGroupCall::deserialize($stream);
        $participants = Deserializer::vectorOfObjects($stream, [GroupCallParticipant::class, 'deserialize']);
        $participantsNextOffset = Deserializer::bytes($stream);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $call,
            $participants,
            $participantsNextOffset,
            $chats,
            $users
        );
    }
}