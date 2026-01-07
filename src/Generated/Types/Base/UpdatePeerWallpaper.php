<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePeerWallpaper
 */
final class UpdatePeerWallpaper extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xae3f101d;
    
    public string $predicate = 'updatePeerWallpaper';
    
    /**
     * @param AbstractPeer $peer
     * @param true|null $wallpaperOverridden
     * @param AbstractWallPaper|null $wallpaper
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?true $wallpaperOverridden = null,
        public readonly ?AbstractWallPaper $wallpaper = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->wallpaperOverridden) {
            $flags |= (1 << 1);
        }
        if ($this->wallpaper !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->wallpaper->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $wallpaperOverridden = (($flags & (1 << 1)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);
        $wallpaper = (($flags & (1 << 0)) !== 0) ? AbstractWallPaper::deserialize($__payload, $__offset) : null;

        return new self(
            $peer,
            $wallpaperOverridden,
            $wallpaper
        );
    }
}