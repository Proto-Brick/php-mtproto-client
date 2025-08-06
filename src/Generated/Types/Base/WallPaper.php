<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/wallPaper
 */
final class WallPaper extends AbstractWallPaper
{
    public const CONSTRUCTOR_ID = 0xa437c3ed;
    
    public string $_ = 'wallPaper';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $slug
     * @param AbstractDocument $document
     * @param bool|null $creator
     * @param bool|null $default_
     * @param bool|null $pattern
     * @param bool|null $dark
     * @param WallPaperSettings|null $settings
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $slug,
        public readonly AbstractDocument $document,
        public readonly ?bool $creator = null,
        public readonly ?bool $default_ = null,
        public readonly ?bool $pattern = null,
        public readonly ?bool $dark = null,
        public readonly ?WallPaperSettings $settings = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->default_) $flags |= (1 << 1);
        if ($this->pattern) $flags |= (1 << 3);
        if ($this->dark) $flags |= (1 << 4);
        if ($this->settings !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->id);
        $buffer .= $serializer->int64($this->accessHash);
        $buffer .= $serializer->bytes($this->slug);
        $buffer .= $this->document->serialize($serializer);
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $id = $deserializer->int64($stream);
        $creator = ($flags & (1 << 0)) ? true : null;
        $default_ = ($flags & (1 << 1)) ? true : null;
        $pattern = ($flags & (1 << 3)) ? true : null;
        $dark = ($flags & (1 << 4)) ? true : null;
        $accessHash = $deserializer->int64($stream);
        $slug = $deserializer->bytes($stream);
        $document = AbstractDocument::deserialize($deserializer, $stream);
        $settings = ($flags & (1 << 2)) ? WallPaperSettings::deserialize($deserializer, $stream) : null;
        return new self(
            $id,
            $accessHash,
            $slug,
            $document,
            $creator,
            $default_,
            $pattern,
            $dark,
            $settings
        );
    }
}