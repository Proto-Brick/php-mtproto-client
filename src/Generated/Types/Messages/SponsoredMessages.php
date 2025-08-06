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
    
    public string $_ = 'messages.sponsoredMessages';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->postsBetween !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->postsBetween);
        }
        $buffer .= $serializer->vectorOfObjects($this->messages);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $postsBetween = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $messages = $deserializer->vectorOfObjects($stream, [SponsoredMessage::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $messages,
            $chats,
            $users,
            $postsBetween
        );
    }
}