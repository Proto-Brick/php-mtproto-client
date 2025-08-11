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
    public const CONSTRUCTOR_ID = 0xaeaf9e74;
    
    public string $_ = 'updateSavedDialogPinned';
    
    /**
     * @param AbstractDialogPeer $peer
     * @param bool|null $pinned
     */
    public function __construct(
        public readonly AbstractDialogPeer $peer,
        public readonly ?bool $pinned = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pinned) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $pinned = ($flags & (1 << 0)) ? true : null;
        $peer = AbstractDialogPeer::deserialize($stream);
        return new self(
            $peer,
            $pinned
        );
    }
}