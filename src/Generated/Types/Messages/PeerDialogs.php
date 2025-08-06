<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialog;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Updates\State;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.peerDialogs
 */
final class PeerDialogs extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3371c354;
    
    public string $_ = 'messages.peerDialogs';
    
    /**
     * @param list<AbstractDialog> $dialogs
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param State $state
     */
    public function __construct(
        public readonly array $dialogs,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly State $state
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->dialogs);
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        $buffer .= $this->state->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $dialogs = $deserializer->vectorOfObjects($stream, [AbstractDialog::class, 'deserialize']);
        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $state = State::deserialize($deserializer, $stream);
        return new self(
            $dialogs,
            $messages,
            $chats,
            $users,
            $state
        );
    }
}