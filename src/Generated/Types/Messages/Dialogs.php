<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialog;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.dialogs
 */
final class Dialogs extends AbstractDialogs
{
    public const CONSTRUCTOR_ID = 0x15ba6c40;
    
    public string $_ = 'messages.dialogs';
    
    /**
     * @param list<AbstractDialog> $dialogs
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $dialogs,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->dialogs);
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $dialogs = $deserializer->vectorOfObjects($stream, [AbstractDialog::class, 'deserialize']);
        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $dialogs,
            $messages,
            $chats,
            $users
        );
    }
}