<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessagePeerVote;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.votesList
 */
final class VotesList extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4899484e;
    
    public string $_ = 'messages.votesList';
    
    /**
     * @param int $count
     * @param list<AbstractMessagePeerVote> $votes
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param string|null $nextOffset
     */
    public function __construct(
        public readonly int $count,
        public readonly array $votes,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?string $nextOffset = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nextOffset !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->votes);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->nextOffset);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $count = $deserializer->int32($stream);
        $votes = $deserializer->vectorOfObjects($stream, [AbstractMessagePeerVote::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        $nextOffset = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        return new self(
            $count,
            $votes,
            $chats,
            $users,
            $nextOffset
        );
    }
}