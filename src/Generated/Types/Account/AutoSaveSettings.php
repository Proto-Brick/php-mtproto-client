<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChat;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AutoSaveException;
use DigitalStars\MtprotoClient\Generated\Types\Base\AutoSaveSettings as BaseAutoSaveSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.autoSaveSettings
 */
final class AutoSaveSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4c3e069d;
    
    public string $_ = 'account.autoSaveSettings';
    
    /**
     * @param BaseAutoSaveSettings $usersSettings
     * @param BaseAutoSaveSettings $chatsSettings
     * @param BaseAutoSaveSettings $broadcastsSettings
     * @param list<AutoSaveException> $exceptions
     * @param list<AbstractChat> $chats
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly BaseAutoSaveSettings $usersSettings,
        public readonly BaseAutoSaveSettings $chatsSettings,
        public readonly BaseAutoSaveSettings $broadcastsSettings,
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $usersSettings = BaseAutoSaveSettings::deserialize($deserializer, $stream);
        $chatsSettings = BaseAutoSaveSettings::deserialize($deserializer, $stream);
        $broadcastsSettings = BaseAutoSaveSettings::deserialize($deserializer, $stream);
        $exceptions = $deserializer->vectorOfObjects($stream, [AutoSaveException::class, 'deserialize']);
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