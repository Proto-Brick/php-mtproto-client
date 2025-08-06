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
    
    public string $_ = 'dialogFilter';
    
    /**
     * @param int $id
     * @param string $title
     * @param list<AbstractInputPeer> $pinnedPeers
     * @param list<AbstractInputPeer> $includePeers
     * @param list<AbstractInputPeer> $excludePeers
     * @param bool|null $contacts
     * @param bool|null $nonContacts
     * @param bool|null $groups
     * @param bool|null $broadcasts
     * @param bool|null $bots
     * @param bool|null $excludeMuted
     * @param bool|null $excludeRead
     * @param bool|null $excludeArchived
     * @param string|null $emoticon
     * @param int|null $color
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly array $pinnedPeers,
        public readonly array $includePeers,
        public readonly array $excludePeers,
        public readonly ?bool $contacts = null,
        public readonly ?bool $nonContacts = null,
        public readonly ?bool $groups = null,
        public readonly ?bool $broadcasts = null,
        public readonly ?bool $bots = null,
        public readonly ?bool $excludeMuted = null,
        public readonly ?bool $excludeRead = null,
        public readonly ?bool $excludeArchived = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $color = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
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
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->id);
        $buffer .= $serializer->bytes($this->title);
        if ($flags & (1 << 25)) {
            $buffer .= $serializer->bytes($this->emoticon);
        }
        if ($flags & (1 << 27)) {
            $buffer .= $serializer->int32($this->color);
        }
        $buffer .= $serializer->vectorOfObjects($this->pinnedPeers);
        $buffer .= $serializer->vectorOfObjects($this->includePeers);
        $buffer .= $serializer->vectorOfObjects($this->excludePeers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $contacts = ($flags & (1 << 0)) ? true : null;
        $nonContacts = ($flags & (1 << 1)) ? true : null;
        $groups = ($flags & (1 << 2)) ? true : null;
        $broadcasts = ($flags & (1 << 3)) ? true : null;
        $bots = ($flags & (1 << 4)) ? true : null;
        $excludeMuted = ($flags & (1 << 11)) ? true : null;
        $excludeRead = ($flags & (1 << 12)) ? true : null;
        $excludeArchived = ($flags & (1 << 13)) ? true : null;
        $id = $deserializer->int32($stream);
        $title = $deserializer->bytes($stream);
        $emoticon = ($flags & (1 << 25)) ? $deserializer->bytes($stream) : null;
        $color = ($flags & (1 << 27)) ? $deserializer->int32($stream) : null;
        $pinnedPeers = $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $excludePeers = $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
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