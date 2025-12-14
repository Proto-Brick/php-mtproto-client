<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Contracts\PeerEntity;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/dialogFilterChatlist
 */
final class DialogFilterChatlist extends AbstractDialogFilter implements PeerEntity
{
    public const CONSTRUCTOR_ID = 0x96537bd7;
    
    public string $predicate = 'dialogFilterChatlist';
    
    /**
     * @param int $id
     * @param TextWithEntities $title
     * @param list<AbstractInputPeer> $pinnedPeers
     * @param list<AbstractInputPeer> $includePeers
     * @param true|null $hasMyInvites
     * @param true|null $titleNoanimate
     * @param string|null $emoticon
     * @param int|null $color
     */
    public function __construct(
        public readonly int $id,
        public readonly TextWithEntities $title,
        public readonly array $pinnedPeers,
        public readonly array $includePeers,
        public readonly ?true $hasMyInvites = null,
        public readonly ?true $titleNoanimate = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $color = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasMyInvites) {
            $flags |= (1 << 26);
        }
        if ($this->titleNoanimate) {
            $flags |= (1 << 28);
        }
        if ($this->emoticon !== null) {
            $flags |= (1 << 25);
        }
        if ($this->color !== null) {
            $flags |= (1 << 27);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->title->serialize();
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
        $hasMyInvites = (($flags & (1 << 26)) !== 0) ? true : null;
        $titleNoanimate = (($flags & (1 << 28)) !== 0) ? true : null;
        $id = Deserializer::int32($stream);
        $title = TextWithEntities::deserialize($stream);
        $emoticon = (($flags & (1 << 25)) !== 0) ? Deserializer::bytes($stream) : null;
        $color = (($flags & (1 << 27)) !== 0) ? Deserializer::int32($stream) : null;
        $pinnedPeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = Deserializer::vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);

        return new self(
            $id,
            $title,
            $pinnedPeers,
            $includePeers,
            $hasMyInvites,
            $titleNoanimate,
            $emoticon,
            $color
        );
    }
}