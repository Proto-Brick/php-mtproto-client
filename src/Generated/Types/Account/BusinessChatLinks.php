<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessChatLink;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.businessChatLinks
 */
final class BusinessChatLinks extends TlObject
{
    public const CONSTRUCTOR_ID = 0xec43a2d1;
    
    public string $_ = 'account.businessChatLinks';
    
    /**
     * @param list<BusinessChatLink> $links
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $links,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->links);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $links = $deserializer->vectorOfObjects($stream, [BusinessChatLink::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
        return new self(
            $links,
            $chats,
            $users
        );
    }
}