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
final class ResolvedBusinessChatLinks extends AbstractResolvedBusinessChatLinks
{
    public const CONSTRUCTOR_ID = 2586029857;
    
    public string $_ = 'account.resolvedBusinessChatLinks';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $peer,
            $message,
            $chats,
            $users,
            $entities
        );
    }
}