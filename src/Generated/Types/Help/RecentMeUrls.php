<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractRecentMeUrl;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.recentMeUrls
 */
final class RecentMeUrls extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe0310d7;
    
    public string $predicate = 'help.recentMeUrls';
    
    /**
     * @param list<AbstractRecentMeUrl> $urls
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $urls,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->urls);
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
        $urls = Deserializer::vectorOfObjects($stream, [AbstractRecentMeUrl::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);

        return new self(
            $urls,
            $chats,
            $users
        );
    }
}