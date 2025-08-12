<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/wallPaperSettings
 */
final class WallPaperSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x372efcd0;
    
    public string $predicate = 'wallPaperSettings';
    
    /**
     * @param true|null $blur
     * @param true|null $motion
     * @param int|null $backgroundColor
     * @param int|null $secondBackgroundColor
     * @param int|null $thirdBackgroundColor
     * @param int|null $fourthBackgroundColor
     * @param int|null $intensity
     * @param int|null $rotation
     * @param string|null $emoticon
     */
    public function __construct(
        public readonly ?true $blur = null,
        public readonly ?true $motion = null,
        public readonly ?int $backgroundColor = null,
        public readonly ?int $secondBackgroundColor = null,
        public readonly ?int $thirdBackgroundColor = null,
        public readonly ?int $fourthBackgroundColor = null,
        public readonly ?int $intensity = null,
        public readonly ?int $rotation = null,
        public readonly ?string $emoticon = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->blur) $flags |= (1 << 1);
        if ($this->motion) $flags |= (1 << 2);
        if ($this->backgroundColor !== null) $flags |= (1 << 0);
        if ($this->secondBackgroundColor !== null) $flags |= (1 << 4);
        if ($this->thirdBackgroundColor !== null) $flags |= (1 << 5);
        if ($this->fourthBackgroundColor !== null) $flags |= (1 << 6);
        if ($this->intensity !== null) $flags |= (1 << 3);
        if ($this->rotation !== null) $flags |= (1 << 4);
        if ($this->emoticon !== null) $flags |= (1 << 7);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->backgroundColor);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->secondBackgroundColor);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int32($this->thirdBackgroundColor);
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::int32($this->fourthBackgroundColor);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->intensity);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::int32($this->rotation);
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::bytes($this->emoticon);
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
        $blur = ($flags & (1 << 1)) ? true : null;
        $motion = ($flags & (1 << 2)) ? true : null;
        $backgroundColor = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $secondBackgroundColor = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $thirdBackgroundColor = ($flags & (1 << 5)) ? Deserializer::int32($stream) : null;
        $fourthBackgroundColor = ($flags & (1 << 6)) ? Deserializer::int32($stream) : null;
        $intensity = ($flags & (1 << 3)) ? Deserializer::int32($stream) : null;
        $rotation = ($flags & (1 << 4)) ? Deserializer::int32($stream) : null;
        $emoticon = ($flags & (1 << 7)) ? Deserializer::bytes($stream) : null;

        return new self(
            $blur,
            $motion,
            $backgroundColor,
            $secondBackgroundColor,
            $thirdBackgroundColor,
            $fourthBackgroundColor,
            $intensity,
            $rotation,
            $emoticon
        );
    }
}