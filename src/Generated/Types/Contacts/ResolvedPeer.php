<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/contacts.resolvedPeer
 */
final class ResolvedPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0x7f077ad9;
    
    public string $predicate = 'contacts.resolvedPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $peer,
            $chats,
            $users
        );
    }
}