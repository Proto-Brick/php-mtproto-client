<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputThemeSettings
 */
final class InputThemeSettings extends AbstractInputThemeSettings
{
    public const CONSTRUCTOR_ID = 2413711439;
    
    public string $_ = 'inputThemeSettings';
    
    /**
     * @param AbstractBaseTheme $baseTheme
     * @param int $accentColor
     * @param bool|null $messageColorsAnimated
     * @param int|null $outboxAccentColor
     * @param list<int>|null $messageColors
     * @param AbstractInputWallPaper|null $wallpaper
     * @param AbstractWallPaperSettings|null $wallpaperSettings
     */
    public function __construct(
        public readonly AbstractBaseTheme $baseTheme,
        public readonly int $accentColor,
        public readonly ?bool $messageColorsAnimated = null,
        public readonly ?int $outboxAccentColor = null,
        public readonly ?array $messageColors = null,
        public readonly ?AbstractInputWallPaper $wallpaper = null,
        public readonly ?AbstractWallPaperSettings $wallpaperSettings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->messageColorsAnimated) $flags |= (1 << 2);
        if ($this->outboxAccentColor !== null) $flags |= (1 << 3);
        if ($this->messageColors !== null) $flags |= (1 << 0);
        if ($this->wallpaper !== null) $flags |= (1 << 1);
        if ($this->wallpaperSettings !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->baseTheme->serialize($serializer);
        $buffer .= $serializer->int32($this->accentColor);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->int32($this->outboxAccentColor);
        }
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfInts($this->messageColors);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->wallpaper->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->wallpaperSettings->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $messageColorsAnimated = ($flags & (1 << 2)) ? true : null;
        $baseTheme = AbstractBaseTheme::deserialize($deserializer, $stream);
        $accentColor = $deserializer->int32($stream);
        $outboxAccentColor = ($flags & (1 << 3)) ? $deserializer->int32($stream) : null;
        $messageColors = ($flags & (1 << 0)) ? $deserializer->vectorOfInts($stream) : null;
        $wallpaper = ($flags & (1 << 1)) ? AbstractInputWallPaper::deserialize($deserializer, $stream) : null;
        $wallpaperSettings = ($flags & (1 << 1)) ? AbstractWallPaperSettings::deserialize($deserializer, $stream) : null;
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