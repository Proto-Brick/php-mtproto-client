<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\SponsoredMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.sponsoredMessages
 */
final class SponsoredMessages extends AbstractSponsoredMessages
{
    public const CONSTRUCTOR_ID = 0xc9ee1d87;
    
    public string $predicate = 'messages.sponsoredMessages';
    
    /**
     * @param list<SponsoredMessage> $messages
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     * @param int|null $postsBetween
     */
    public function __construct(
        public readonly array $messages,
        public readonly array $chats,
        public readonly array $users,
        public readonly ?int $postsBetween = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->postsBetween !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->postsBetween);
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
        $postsBetween = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $messages = Deserializer::vectorOfObjects($stream, [SponsoredMessage::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $messages,
            $chats,
            $users,
            $postsBetween
        );
    }
}