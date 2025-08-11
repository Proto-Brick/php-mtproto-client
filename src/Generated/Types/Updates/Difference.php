<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEncryptedMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.difference
 */
final class Difference extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0xf49ca0;
    
    public string $_ = 'updates.difference';
    
    /**
     * @param list<AbstractMessage> $newMessages
     * @param list<AbstractEncryptedMessage> $newEncryptedMessages
     * @param list<AbstractUpdate> $otherUpdates
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param State $state
     */
    public function __construct(
        public readonly array $newMessages,
        public readonly array $newEncryptedMessages,
        public readonly array $otherUpdates,
        public readonly array $chats,
        public readonly array $users,
        public readonly State $state
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->newMessages);
        $buffer .= Serializer::vectorOfObjects($this->newEncryptedMessages);
        $buffer .= Serializer::vectorOfObjects($this->otherUpdates);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        $buffer .= $this->state->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $newMessages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $newEncryptedMessages = Deserializer::vectorOfObjects($stream, [AbstractEncryptedMessage::class, 'deserialize']);
        $otherUpdates = Deserializer::vectorOfObjects($stream, [AbstractUpdate::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $state = State::deserialize($stream);
        return new self(
            $newMessages,
            $newEncryptedMessages,
            $otherUpdates,
            $chats,
            $users,
            $state
        );
    }
}