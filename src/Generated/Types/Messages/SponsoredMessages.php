<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SponsoredMessage;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.sponsoredMessages
 */
final class SponsoredMessages extends AbstractSponsoredMessages
{
    public const CONSTRUCTOR_ID = 0xffda656d;
    
    public string $predicate = 'messages.sponsoredMessages';
    
    /**
     * @param list<SponsoredMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param int|null $postsBetween
     * @param int|null $startDelay
     * @param int|null $betweenDelay
     */
    public function __construct(
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?int $postsBetween = null,
        public readonly ?int $startDelay = null,
        public readonly ?int $betweenDelay = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->postsBetween !== null) {
            $flags |= (1 << 0);
        }
        if ($this->startDelay !== null) {
            $flags |= (1 << 1);
        }
        if ($this->betweenDelay !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->postsBetween);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->startDelay);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->betweenDelay);
        }
        $buffer .= Serializer::vectorOfObjects($this->messages);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $postsBetween = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;
        $startDelay = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $betweenDelay = (($flags & (1 << 2)) !== 0) ? Deserializer::int32($stream) : null;
        $messages = Deserializer::vectorOfObjects($stream, [SponsoredMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $messages,
            $chats,
            $users,
            $postsBetween,
            $startDelay,
            $betweenDelay
        );
    }
}