<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatlists.chatlistInviteAlready
 */
final class ChatlistInviteAlready extends AbstractChatlistInvite
{
    public const CONSTRUCTOR_ID = 0xfa87f659;
    
    public string $predicate = 'chatlists.chatlistInviteAlready';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->filterId);
        $buffer .= Serializer::vectorOfObjects($this->missingPeers);
        $buffer .= Serializer::vectorOfObjects($this->alreadyPeers);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $filterId = Deserializer::int32($__payload, $__offset);
        $missingPeers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPeer::class, 'deserialize']);
        $alreadyPeers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPeer::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $filterId,
            $missingPeers,
            $alreadyPeers,
            $chats,
            $users
        );
    }
}