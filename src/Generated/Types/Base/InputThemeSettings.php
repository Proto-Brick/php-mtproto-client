<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputThemeSettings
 */
final class InputThemeSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8fde504f;
    
    public string $predicate = 'inputThemeSettings';
    
    /**
     * @param BaseTheme $baseTheme
     * @param int $accentColor
     * @param true|null $messageColorsAnimated
     * @param int|null $outboxAccentColor
     * @param list<int>|null $messageColors
     * @param AbstractInputWallPaper|null $wallpaper
     * @param WallPaperSettings|null $wallpaperSettings
     */
    public function __construct(
        public readonly BaseTheme $baseTheme,
        public readonly int $accentColor,
        public readonly ?true $messageColorsAnimated = null,
        public readonly ?int $outboxAccentColor = null,
        public readonly ?array $messageColors = null,
        public readonly ?AbstractInputWallPaper $wallpaper = null,
        public readonly ?WallPaperSettings $wallpaperSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->messageColorsAnimated) {
            $flags |= (1 << 2);
        }
        if ($this->outboxAccentColor !== null) {
            $flags |= (1 << 3);
        }
        if ($this->messageColors !== null) {
            $flags |= (1 << 0);
        }
        if ($this->wallpaper !== null) {
            $flags |= (1 << 1);
        }
        if ($this->wallpaperSettings !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->baseTheme->serialize();
        $buffer .= Serializer::int32($this->accentColor);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->outboxAccentColor);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->messageColors);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->wallpaper->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->wallpaperSettings->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $messageColorsAnimated = (($flags & (1 << 2)) !== 0) ? true : null;
        $baseTheme = BaseTheme::deserialize($stream);
        $accentColor = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $outboxAccentColor = (($flags & (1 << 3)) !== 0) ? Deserializer::int32($stream) : null;
        $messageColors = (($flags & (1 << 0)) !== 0) ? Deserializer::vectorOfInts($stream) : null;
        $wallpaper = (($flags & (1 << 1)) !== 0) ? AbstractInputWallPaper::deserialize($stream) : null;
        $wallpaperSettings = (($flags & (1 << 1)) !== 0) ? WallPaperSettings::deserialize($stream) : null;

        return new self(
            $baseTheme,
            $accentColor,
            $messageColorsAnimated,
            $outboxAccentColor,
            $messageColors,
            $wallpaper,
            $wallpaperSettings
        );
    }
}