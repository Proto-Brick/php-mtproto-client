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
    public const CONSTRUCTOR_ID = 16030880;
    
    public string $_ = 'updates.difference';
    
    /**
     * @param list<AbstractMessage> $newMessages
     * @param list<AbstractEncryptedMessage> $newEncryptedMessages
     * @param list<AbstractUpdate> $otherUpdates
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param AbstractState $state
     */
    public function __construct(
        public readonly array $newMessages,
        public readonly array $newEncryptedMessages,
        public readonly array $otherUpdates,
        public readonly array $chats,
        public readonly array $users,
        public readonly AbstractState $state
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->newMessages);
        $buffer .= $serializer->vectorOfObjects($this->newEncryptedMessages);
        $buffer .= $serializer->vectorOfObjects($this->otherUpdates);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $this->state->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $newMessages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $newEncryptedMessages = $deserializer->vectorOfObjects($stream, [AbstractEncryptedMessage::class, 'deserialize']);
        $otherUpdates = $deserializer->vectorOfObjects($stream, [AbstractUpdate::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $state = AbstractState::deserialize($deserializer, $stream);
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