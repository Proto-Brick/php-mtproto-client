<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
        if ($this->messageColorsAnimated) $flags |= (1 << 2);
        if ($this->outboxAccentColor !== null) $flags |= (1 << 3);
        if ($this->messageColors !== null) $flags |= (1 << 0);
        if ($this->wallpaper !== null) $flags |= (1 << 1);
        if ($this->wallpaperSettings !== null) $flags |= (1 << 1);
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
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $messageColorsAnimated = ($flags & (1 << 2)) ? true : null;
        $baseTheme = BaseTheme::deserialize($stream);
        $accentColor = Deserializer::int32($stream);
        $outboxAccentColor = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $messageColors = ($flags & (1 << 0)) ? Deserializer::vectorOfInts($stream) : null;
        $wallpaper = ($flags & (1 << 1)) ? AbstractInputWallPaper::deserialize($stream) : null;
        $wallpaperSettings = ($flags & (1 << 1)) ? WallPaperSettings::deserialize($stream) : null;

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