<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputBusinessRecipients
 */
final class InputBusinessRecipients extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6f8b32aa;
    
    public string $_ = 'inputBusinessRecipients';
    
    /**
     * @param bool|null $existingChats
     * @param bool|null $newChats
     * @param bool|null $contacts
     * @param bool|null $nonContacts
     * @param bool|null $excludeSelected
     * @param list<AbstractInputUser>|null $users
     */
    public function __construct(
        public readonly ?bool $existingChats = null,
        public readonly ?bool $newChats = null,
        public readonly ?bool $contacts = null,
        public readonly ?bool $nonContacts = null,
        public readonly ?bool $excludeSelected = null,
        public readonly ?array $users = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->existingChats) $flags |= (1 << 0);
        if ($this->newChats) $flags |= (1 << 1);
        if ($this->contacts) $flags |= (1 << 2);
        if ($this->nonContacts) $flags |= (1 << 3);
        if ($this->excludeSelected) $flags |= (1 << 5);
        if ($this->users !== null) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->users);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $existingChats = ($flags & (1 << 0)) ? true : null;
        $newChats = ($flags & (1 << 1)) ? true : null;
        $contacts = ($flags & (1 << 2)) ? true : null;
        $nonContacts = ($flags & (1 << 3)) ? true : null;
        $excludeSelected = ($flags & (1 << 5)) ? true : null;
        $users = ($flags & (1 << 4)) ? Deserializer::vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']) : null;
        return new self(
            $existingChats,
            $newChats,
            $contacts,
            $nonContacts,
            $excludeSelected,
            $users
        );
    }
}