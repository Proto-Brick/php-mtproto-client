<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TopPeerCategoryPeers;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/contacts.topPeers
 */
final class TopPeers extends AbstractTopPeers
{
    public const CONSTRUCTOR_ID = 0x70b772a8;
    
    public string $predicate = 'contacts.topPeers';
    
    /**
     * @param list<TopPeerCategoryPeers> $categories
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $categories,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->categories);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $categories = Deserializer::vectorOfObjects($__payload, $__offset, [TopPeerCategoryPeers::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $categories,
            $chats,
            $users
        );
    }
}