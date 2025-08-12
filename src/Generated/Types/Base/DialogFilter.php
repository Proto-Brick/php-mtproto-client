<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialogFilter
 */
final class DialogFilter extends AbstractDialogFilter
{
    public const CONSTRUCTOR_ID = 0x5fb5523b;
    
    public string $predicate = 'dialogFilter';
    
    /**
     * @param int $id
     * @param string $title
     * @param list<AbstractInputPeer> $pinnedPeers
     * @param list<AbstractInputPeer> $includePeers
     * @param list<AbstractInputPeer> $excludePeers
     * @param true|null $contacts
     * @param true|null $nonContacts
     * @param true|null $groups
     * @param true|null $broadcasts
     * @param true|null $bots
     * @param true|null $excludeMuted
     * @param true|null $excludeRead
     * @param true|null $excludeArchived
     * @param string|null $emoticon
     * @param int|null $color
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly array $pinnedPeers,
        public readonly array $includePeers,
        public readonly array $excludePeers,
        public readonly ?true $contacts = null,
        public readonly ?true $nonContacts = null,
        public readonly ?true $groups = null,
        public readonly ?true $broadcasts = null,
        public readonly ?true $bots = null,
        public readonly ?true $excludeMuted = null,
        public readonly ?true $excludeRead = null,
        public readonly ?true $excludeArchived = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $color = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->contacts) $flags |= (1 << 0);
        if ($this->nonContacts) $flags |= (1 << 1);
        if ($this->groups) $flags |= (1 << 2);
        if ($this->broadcasts) $flags |= (1 << 3);
        if ($this->bots) $flags |= (1 << 4);
        if ($this->excludeMuted) $flags |= (1 << 11);
        if ($this->excludeRead) $flags |= (1 << 12);
        if ($this->excludeArchived) $flags |= (1 << 13);
        if ($this->emoticon !== null) $flags |= (1 << 25);
        if ($this->color !== null) $flags |= (1 << 27);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= Serializer::bytes($this->title);
        if ($flags & (1 << 25)) {
            $buffer .= Serializer::bytes($this->emoticon);
        }
        if ($flags & (1 << 27)) {
            $buffer .= Serializer::int32($this->color);
        }
        $buffer .= Serializer::vectorOfObjects($this->pinnedPeers);
        $buffer .= Serializer::vectorOfObjects($this->includePeers);
        $buffer .= Serializer::vectorOfObjects($this->excludePeers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $contacts = ($flags & (1 << 0)) ? true : null;
        $nonContacts = ($flags & (1 << 1)) ? true : null;
        $groups = ($flags & (1 << 2)) ? true : null;
        $broadcasts = ($flags & (1 << 3)) ? true : null;
        $bots = ($flags & (1 << 4)) ? true : null;
        $excludeMuted = ($flags & (1 << 11)) ? true : null;
        $excludeRead = ($flags & (1 << 12)) ? true : null;
        $excludeArchived = ($flags & (1 << 13)) ? true : null;
        $id = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $emoticon = ($flags & (1 << 25)) ? Deserializer::bytes($stream) : null;
        $color = ($flags & (1 << 27)) ? Deserializer::int32($stream) : null;
        $pinnedPeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $excludePeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);

        return new self(
            $id,
            $title,
            $pinnedPeers,
            $includePeers,
            $excludePeers,
            $contacts,
            $nonContacts,
            $groups,
            $broadcasts,
            $bots,
            $excludeMuted,
            $excludeRead,
            $excludeArchived,
            $emoticon,
            $color
        );
    }
}