<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateSavedDialogPinned
 */
final class UpdateSavedDialogPinned extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2930744948;
    
    public string $_ = 'updateSavedDialogPinned';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractDialogPeer::deserialize($deserializer, $stream);
            return new self(
            $peer,
            $pinned
        );
    }
}