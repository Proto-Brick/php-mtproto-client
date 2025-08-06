<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePeerWallpaper
 */
final class UpdatePeerWallpaper extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xae3f101d;
    
    public string $_ = 'updatePeerWallpaper';
    
    /**
     * @param AbstractPeer $peer
     * @param bool|null $wallpaperOverridden
     * @param AbstractWallPaper|null $wallpaper
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?bool $wallpaperOverridden = null,
        public readonly ?AbstractWallPaper $wallpaper = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->wallpaperOverridden) $flags |= (1 << 1);
        if ($this->wallpaper !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->wallpaper->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $wallpaperOverridden = ($flags & (1 << 1)) ? true : null;
        $peer = AbstractPeer::deserialize($deserializer, $stream);
        $wallpaper = ($flags & (1 << 0)) ? AbstractWallPaper::deserialize($deserializer, $stream) : null;
        return new self(
            $peer,
            $wallpaperOverridden,
            $wallpaper
        );
    }
}