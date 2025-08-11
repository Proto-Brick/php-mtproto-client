<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatlists.chatlistInvite
 */
final class ChatlistInvite extends AbstractChatlistInvite
{
    public const CONSTRUCTOR_ID = 0x1dcd839d;
    
    public string $_ = 'chatlists.chatlistInvite';
    
    /**
     * @param string $title
     * @param list<AbstractPeer> $peers
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param string|null $emoticon
     */
    public function __construct(
        public readonly string $title,
        public readonly array $peers,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?string $emoticon = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emoticon !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->emoticon);
        }
        $buffer .= Serializer::vectorOfObjects($this->peers);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $title = Deserializer::bytes($stream);
        $emoticon = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $peers = Deserializer::vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $title,
            $peers,
            $chats,
            $users,
            $emoticon
        );
    }
}