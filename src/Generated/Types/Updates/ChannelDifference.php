<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdate;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.channelDifference
 */
final class ChannelDifference extends AbstractChannelDifference
{
    public const CONSTRUCTOR_ID = 0x2064674e;
    
    public string $_ = 'updates.channelDifference';
    
    /**
     * @param int $pts
     * @param list<AbstractMessage> $newMessages
     * @param list<AbstractUpdate> $otherUpdates
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param bool|null $final_
     * @param int|null $timeout
     */
    public function __construct(
        public readonly int $pts,
        public readonly array $newMessages,
        public readonly array $otherUpdates,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?bool $final_ = null,
        public readonly ?int $timeout = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->final_) $flags |= (1 << 0);
        if ($this->timeout !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->pts);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->timeout);
        }
        $buffer .= Serializer::vectorOfObjects($this->newMessages);
        $buffer .= Serializer::vectorOfObjects($this->otherUpdates);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $final_ = ($flags & (1 << 0)) ? true : null;
        $pts = Deserializer::int32($stream);
        $timeout = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $newMessages = Deserializer::vectorOfObjects($stream, [AbstractMessage::class, 'deserialize']);
        $otherUpdates = Deserializer::vectorOfObjects($stream, [AbstractUpdate::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $pts,
            $newMessages,
            $otherUpdates,
            $chats,
            $users,
            $final_,
            $timeout
        );
    }
}