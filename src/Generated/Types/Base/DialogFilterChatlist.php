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
    
    public function getPeerType(): string
    {
        return 'chat';
    }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $hasMyInvites = (($flags & (1 << 26)) !== 0) ? true : null;
        $titleNoanimate = (($flags & (1 << 28)) !== 0) ? true : null;
        $id = Deserializer::int32($__payload, $__offset);
        $title = TextWithEntities::deserialize($__payload, $__offset);
        $emoticon = (($flags & (1 << 25)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $color = (($flags & (1 << 27)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $pinnedPeers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractInputPeer::class, 'deserialize']);

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