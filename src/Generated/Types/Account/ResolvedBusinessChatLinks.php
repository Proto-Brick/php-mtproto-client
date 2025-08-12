<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.resolvedBusinessChatLinks
 */
final class ResolvedBusinessChatLinks extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a23af21;
    
    public string $predicate = 'account.resolvedBusinessChatLinks';
    
    /**
     * @param AbstractPeer $peer
     * @param string $message
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly string $message,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $peer = AbstractPeer::deserialize($stream);
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $peer,
            $message,
            $chats,
            $users,
            $entities
        );
    }
}