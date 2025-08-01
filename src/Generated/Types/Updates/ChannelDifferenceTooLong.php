<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialog;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.channelDifferenceTooLong
 */
final class ChannelDifferenceTooLong extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 2763835134;
    
    public string $_ = 'updates.channelDifferenceTooLong';
    
    /**
     * @param AbstractDialog $dialog
     * @param list<AbstractMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly AbstractDialog $dialog,
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $final_ = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->final_) $flags |= (1 << 0);
        if ($this->timeout !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->timeout);
        }
        $buffer .= $this->dialog->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $final_ = ($flags & (1 << 0)) ? true : null;
        $timeout = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $dialog = AbstractDialog::deserialize($deserializer, $stream);
        $messages = $deserializer->vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $dialog,
            $messages,
            $chats,
            $users,
            $final_,
            $timeout
        );
    }
}