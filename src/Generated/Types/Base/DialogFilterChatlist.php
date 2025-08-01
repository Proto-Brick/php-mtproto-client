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
    public const CONSTRUCTOR_ID = 2682424996;
    
    public string $_ = 'dialogFilterChatlist';
    
    /**
     * @param int $id
     * @param string $title
     * @param list<AbstractInputPeer> $pinnedPeers
     * @param list<AbstractInputPeer> $includePeers
     * @param bool|null $hasMyInvites
     * @param string|null $emoticon
     * @param int|null $color
     */
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly array $pinnedPeers,
        public readonly array $includePeers,
        public readonly ?bool $hasMyInvites = null,
        public readonly ?string $emoticon = null,
        public readonly ?int $color = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasMyInvites) $flags |= (1 << 26);
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
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $hasMyInvites = ($flags & (1 << 26)) ? true : null;
        $id = $deserializer->int32($stream);
        $title = $deserializer->bytes($stream);
        $emoticon = ($flags & (1 << 25)) ? $deserializer->bytes($stream) : null;
        $color = ($flags & (1 << 27)) ? $deserializer->int32($stream) : null;
        $pinnedPeers = $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
        $includePeers = $deserializer->vectorOfObjects($stream, [AbstractInputPeer::class, 'deserialize']);
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