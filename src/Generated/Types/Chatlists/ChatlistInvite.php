<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Chatlists;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatlists.chatlistInvite
 */
final class ChatlistInvite extends AbstractChatlistInvite
{
    public const CONSTRUCTOR_ID = 0xf10ece2f;
    
    public string $predicate = 'chatlists.chatlistInvite';
    
    /**
     * @param TextWithEntities $title
     * @param list<AbstractPeer> $peers
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param true|null $titleNoanimate
     * @param string|null $emoticon
     */
    public function __construct(
        public readonly TextWithEntities $title,
        public readonly array $peers,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?true $titleNoanimate = null,
        public readonly ?string $emoticon = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->titleNoanimate) {
            $flags |= (1 << 1);
        }
        if ($this->emoticon !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->title->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->emoticon);
        }
        $buffer .= Serializer::vectorOfObjects($this->peers);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $titleNoanimate = (($flags & (1 << 1)) !== 0) ? true : null;
        $title = TextWithEntities::deserialize($__payload, $__offset);
        $emoticon = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $peers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractPeer::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $title,
            $peers,
            $chats,
            $users,
            $titleNoanimate,
            $emoticon
        );
    }
}