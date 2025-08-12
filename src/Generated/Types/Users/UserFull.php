<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Users;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\UserFull as BaseUserFull;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/users.userFull
 */
final class UserFull extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3b6d152e;
    
    public string $predicate = 'users.userFull';
    
    /**
     * @param BaseUserFull $fullUser
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly BaseUserFull $fullUser,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->fullUser->serialize();
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
        $fullUser = BaseUserFull::deserialize($stream);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $fullUser,
            $chats,
            $users
        );
    }
}