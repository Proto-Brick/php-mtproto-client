<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBusinessBotRecipients
 */
final class InputBusinessBotRecipients extends AbstractInputBusinessBotRecipients
{
    public const CONSTRUCTOR_ID = 3303379486;
    
    public string $_ = 'inputBusinessBotRecipients';
    
    /**
     * @param bool|null $existingChats
     * @param bool|null $newChats
     * @param bool|null $contacts
     * @param bool|null $nonContacts
     * @param bool|null $excludeSelected
     * @param list<AbstractInputUser>|null $users
     * @param list<AbstractInputUser>|null $excludeUsers
     */
    public function __construct(
        public readonly ?bool $existingChats = null,
        public readonly ?bool $newChats = null,
        public readonly ?bool $contacts = null,
        public readonly ?bool $nonContacts = null,
        public readonly ?bool $excludeSelected = null,
        public readonly ?array $users = null,
        public readonly ?array $excludeUsers = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->existingChats) $flags |= (1 << 0);
        if ($this->newChats) $flags |= (1 << 1);
        if ($this->contacts) $flags |= (1 << 2);
        if ($this->nonContacts) $flags |= (1 << 3);
        if ($this->excludeSelected) $flags |= (1 << 5);
        if ($this->users !== null) $flags |= (1 << 4);
        if ($this->excludeUsers !== null) $flags |= (1 << 6);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 4)) {
            $buffer .= $serializer->vectorOfObjects($this->users);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->vectorOfObjects($this->excludeUsers);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $existingChats = ($flags & (1 << 0)) ? true : null;
        $newChats = ($flags & (1 << 1)) ? true : null;
        $contacts = ($flags & (1 << 2)) ? true : null;
        $nonContacts = ($flags & (1 << 3)) ? true : null;
        $excludeSelected = ($flags & (1 << 5)) ? true : null;
        $users = ($flags & (1 << 4)) ? $deserializer->vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']) : null;
        $excludeUsers = ($flags & (1 << 6)) ? $deserializer->vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']) : null;
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