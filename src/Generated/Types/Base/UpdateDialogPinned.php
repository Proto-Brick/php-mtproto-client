<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDialogPinned
 */
final class UpdateDialogPinned extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1852826908;
    
    public string $_ = 'updateDialogPinned';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param bool|null $pinned
     * @param int|null $folderId
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?bool $pinned = null,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        if ($this->folderId !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->folderId);
        }
        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $folderId = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $peer = AbstractDialogPeer::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $pinned,
            $folderId
        );
    }
}