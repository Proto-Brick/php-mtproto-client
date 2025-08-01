<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatlists.chatlistInviteAlready
 */
final class ChatlistInviteAlready extends AbstractChatlistInvite
{
    public const CONSTRUCTOR_ID = 4203214425;
    
    public string $_ = 'chatlists.chatlistInviteAlready';
    
    /**
     * @param int $filterId
     * @param list<AbstractPeer> $missingPeers
     * @param list<AbstractPeer> $alreadyPeers
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly int $filterId,
        public readonly array $missingPeers,
        public readonly array $alreadyPeers,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->filterId);
        $buffer .= $serializer->vectorOfObjects($this->missingPeers);
        $buffer .= $serializer->vectorOfObjects($this->alreadyPeers);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $filterId = $deserializer->int32($stream);
        $missingPeers = $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        $alreadyPeers = $deserializer->vectorOfObjects($stream, [AbstractPeer::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $filterId,
            $missingPeers,
            $alreadyPeers,
            $chats,
            $users
        );
    }
}