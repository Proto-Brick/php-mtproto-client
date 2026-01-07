<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractChat;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoSaveException;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AutoSaveSettings as BaseAutoSaveSettings;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.autoSaveSettings
 */
final class AutoSaveSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4c3e069d;
    
    public string $predicate = 'account.autoSaveSettings';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->usersSettings->serialize();
        $buffer .= $this->chatsSettings->serialize();
        $buffer .= $this->broadcastsSettings->serialize();
        $buffer .= Serializer::vectorOfObjects($this->exceptions);
        $buffer .= Serializer::vectorOfObjects($this->chats);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $usersSettings = BaseAutoSaveSettings::deserialize($__payload, $__offset);
        $chatsSettings = BaseAutoSaveSettings::deserialize($__payload, $__offset);
        $broadcastsSettings = BaseAutoSaveSettings::deserialize($__payload, $__offset);
        $exceptions = Deserializer::vectorOfObjects($__payload, $__offset, [AutoSaveException::class, 'deserialize']);
        $chats = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractChat::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

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