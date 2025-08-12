<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/dialogFilterChatlist
 */
final class DialogFilterChatlist extends AbstractDialogFilter
{
    public const CONSTRUCTOR_ID = 0x9fe28ea4;
    
    public string $predicate = 'dialogFilterChatlist';
    
    /**
     * @param int $id
     * @param string $title
     * @param list<AbstractInputPeer> $pinnedPeers
     * @param list<AbstractInputPeer> $includePeers
     * @param true|null $hasMyInvites
     * @param string|null $emoticon
     * @param int|null $color
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly array $pinnedPeers,
        public readonly array $includePeers,
        public readonly ?true $hasMyInvites = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $color = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasMyInvites) $flags |= (1 << 26);
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

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $hasMyInvites = ($flags & (1 << 26)) ? true : null;
        $id = Deserializer::int32($stream);
        $title = Deserializer::bytes($stream);
        $emoticon = ($flags & (1 << 25)) ? Deserializer::bytes($stream) : null;
        $color = ($flags & (1 << 27)) ? Deserializer::int32($stream) : null;
        $pinnedPeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);

        return new self(
            $id,
            $title,
            $pinnedPeers,
            $includePeers,
            $hasMyInvites,
            $emoticon,
            $color
        );
    }
}