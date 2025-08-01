<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAutoSaveException;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAutoSaveSettings;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.autoSaveSettings
 */
final class AutoSaveSettings extends AbstractAutoSaveSettings
{
    public const CONSTRUCTOR_ID = 1279133341;
    
    public string $_ = 'account.autoSaveSettings';
    
    /**
     * @param AbstractAutoSaveSettings $usersSettings
     * @param AbstractAutoSaveSettings $chatsSettings
     * @param AbstractAutoSaveSettings $broadcastsSettings
     * @param list<AbstractAutoSaveException> $exceptions
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly AbstractAutoSaveSettings $usersSettings,
        public readonly AbstractAutoSaveSettings $chatsSettings,
        public readonly AbstractAutoSaveSettings $broadcastsSettings,
        public readonly array $exceptions,
        public readonly array $chats,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->usersSettings->serialize($serializer);
        $buffer .= $this->chatsSettings->serialize($serializer);
        $buffer .= $this->broadcastsSettings->serialize($serializer);
        $buffer .= $serializer->vectorOfObjects($this->exceptions);
        $buffer .= $serializer->vectorOfObjects($this->chats);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $usersSettings = AbstractAutoSaveSettings::deserialize($deserializer, $stream);
        $chatsSettings = AbstractAutoSaveSettings::deserialize($deserializer, $stream);
        $broadcastsSettings = AbstractAutoSaveSettings::deserialize($deserializer, $stream);
        $exceptions = $deserializer->vectorOfObjects($stream, [AbstractAutoSaveException::class, 'deserialize']);
        $chats = $deserializer->vectorOfObjects($stream, [AbstractChat::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $usersSettings,
            $chatsSettings,
            $broadcastsSettings,
            $exceptions,
            $chats,
            $users
        );
    }
}