<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputBusinessBotRecipients
 */
final class InputBusinessBotRecipients extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc4e5921e;
    
    public string $predicate = 'inputBusinessBotRecipients';
    
    /**
     * @param true|null $existingChats
     * @param true|null $newChats
     * @param true|null $contacts
     * @param true|null $nonContacts
     * @param true|null $excludeSelected
     * @param list<AbstractInputUser>|null $users
     * @param list<AbstractInputUser>|null $excludeUsers
     */
    public function __construct(
        public readonly ?true $existingChats = null,
        public readonly ?true $newChats = null,
        public readonly ?true $contacts = null,
        public readonly ?true $nonContacts = null,
        public readonly ?true $excludeSelected = null,
        public readonly ?array $users = null,
        public readonly ?array $excludeUsers = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->existingChats) {
            $flags |= (1 << 0);
        }
        if ($this->newChats) {
            $flags |= (1 << 1);
        }
        if ($this->contacts) {
            $flags |= (1 << 2);
        }
        if ($this->nonContacts) {
            $flags |= (1 << 3);
        }
        if ($this->excludeSelected) {
            $flags |= (1 << 5);
        }
        if ($this->users !== null) {
            $flags |= (1 << 4);
        }
        if ($this->excludeUsers !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->users);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::vectorOfObjects($this->excludeUsers);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $existingChats = (($flags & (1 << 0)) !== 0) ? true : null;
        $newChats = (($flags & (1 << 1)) !== 0) ? true : null;
        $contacts = (($flags & (1 << 2)) !== 0) ? true : null;
        $nonContacts = (($flags & (1 << 3)) !== 0) ? true : null;
        $excludeSelected = (($flags & (1 << 5)) !== 0) ? true : null;
        $users = (($flags & (1 << 4)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']) : null;
        $excludeUsers = (($flags & (1 << 6)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']) : null;

        return new self(
            $existingChats,
            $newChats,
            $contacts,
            $nonContacts,
            $excludeSelected,
            $users,
            $excludeUsers
        );
    }
}