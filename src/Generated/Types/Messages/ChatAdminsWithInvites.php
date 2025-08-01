<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatAdminWithInvites;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.chatAdminsWithInvites
 */
final class ChatAdminsWithInvites extends AbstractChatAdminsWithInvites
{
    public const CONSTRUCTOR_ID = 3063640791;
    
    public string $_ = 'messages.chatAdminsWithInvites';
    
    /**
     * @param list<AbstractChatAdminWithInvites> $admins
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $admins,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->admins);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $admins = $deserializer->vectorOfObjects($stream, [AbstractChatAdminWithInvites::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $admins,
            $users
        );
    }
}