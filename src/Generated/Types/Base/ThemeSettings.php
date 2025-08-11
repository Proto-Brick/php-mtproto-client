<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/themeSettings
 */
final class ThemeSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfa58b6d4;
    
    public string $_ = 'themeSettings';
    
    /**
     * @param AbstractBaseTheme $baseTheme
     * @param int $accentColor
     * @param bool|null $messageColorsAnimated
     * @param int|null $outboxAccentColor
     * @param list<int>|null $messageColors
     * @param AbstractWallPaper|null $wallpaper
     */
    public function __construct(
        public readonly AbstractBaseTheme $baseTheme,
        public readonly int $accentColor,
        public readonly ?bool $messageColorsAnimated = null,
        public readonly ?int $outboxAccentColor = null,
        public readonly ?array $messageColors = null,
        public readonly ?AbstractWallPaper $wallpaper = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->messageColorsAnimated) $flags |= (1 << 2);
        if ($this->outboxAccentColor !== null) $flags |= (1 << 3);
        if ($this->messageColors !== null) $flags |= (1 << 0);
        if ($this->wallpaper !== null) $flags |= (1 << 1);
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
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $messageColorsAnimated = ($flags & (1 << 2)) ? true : null;
        $baseTheme = AbstractBaseTheme::deserialize($stream);
        $accentColor = Deserializer::int32($stream);
        $outboxAccentColor = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $messageColors = ($flags & (1 << 0)) ? Deserializer::vectorOfInts($stream) : null;
        $wallpaper = ($flags & (1 << 1)) ? AbstractWallPaper::deserialize($stream) : null;
        return new self(
            $baseTheme,
            $accentColor,
            $messageColorsAnimated,
            $outboxAccentColor,
            $messageColors,
            $wallpaper
        );
    }
}