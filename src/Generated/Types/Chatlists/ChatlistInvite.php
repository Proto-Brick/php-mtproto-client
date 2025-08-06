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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->emoticon !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->title);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->emoticon);
        }
        $buffer .= $serializer->vectorOfObjects($this->peers);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $title = $deserializer->bytes($stream);
        $emoticon = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        $peers = $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $title,
            $peers,
            $chats,
            $users,
            $emoticon
        );
    }
}