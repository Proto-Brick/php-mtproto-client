<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/wallPaperNoFile
 */
final class WallPaperNoFile extends AbstractWallPaper
{
    public const CONSTRUCTOR_ID = 0xe0804116;
    
    public string $_ = 'wallPaperNoFile';
    
    /**
     * @param int $id
     * @param bool|null $default_
     * @param bool|null $dark
     * @param WallPaperSettings|null $settings
     */
    public function __construct(
        public readonly int $id,
        public readonly ?bool $default_ = null,
        public readonly ?bool $dark = null,
        public readonly ?WallPaperSettings $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->default_) $flags |= (1 << 1);
        if ($this->dark) $flags |= (1 << 4);
        if ($this->settings !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->id);
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $id = Deserializer::int64($stream);
        $default_ = ($flags & (1 << 1)) ? true : null;
        $dark = ($flags & (1 << 4)) ? true : null;
        $settings = ($flags & (1 << 2)) ? WallPaperSettings::deserialize($stream) : null;
        return new self(
            $id,
            $default_,
            $dark,
            $settings
        );
    }
}