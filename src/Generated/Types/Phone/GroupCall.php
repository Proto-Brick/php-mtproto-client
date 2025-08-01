<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractGroupCallParticipant;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/phone.groupCall
 */
final class GroupCall extends AbstractGroupCall
{
    public const CONSTRUCTOR_ID = 2658302637;
    
    public string $_ = 'phone.groupCall';
    
    /**
     * @param AbstractGroupCall $call
     * @param list<AbstractGroupCallParticipant> $participants
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->participants);
        $buffer .= $serializer->bytes($this->participantsNextOffset);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $call = AbstractGroupCall::deserialize($deserializer, $stream);
        $participants = $deserializer->vectorOfObjects($stream, [AbstractGroupCallParticipant::class, 'deserialize']);
        $participantsNextOffset = $deserializer->bytes($stream);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $call,
            $participants,
            $participantsNextOffset,
            $chats,
            $users
        );
    }
}