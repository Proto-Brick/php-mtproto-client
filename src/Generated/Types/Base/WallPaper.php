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
    
    public string $predicate = 'wallPaper';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param string $slug
     * @param AbstractDocument $document
     * @param true|null $creator
     * @param true|null $default_
     * @param true|null $pattern
     * @param true|null $dark
     * @param WallPaperSettings|null $settings
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly string $slug,
        public readonly AbstractDocument $document,
        public readonly ?true $creator = null,
        public readonly ?true $default_ = null,
        public readonly ?true $pattern = null,
        public readonly ?true $dark = null,
        public readonly ?WallPaperSettings $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->creator) $flags |= (1 << 0);
        if ($this->default_) $flags |= (1 << 1);
        if ($this->pattern) $flags |= (1 << 3);
        if ($this->dark) $flags |= (1 << 4);
        if ($this->settings !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::bytes($this->slug);
        $buffer .= $this->document->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $id = Deserializer::int64($stream);
        $flags = Deserializer::int32($stream);
        $creator = ($flags & (1 << 0)) ? true : null;
        $default_ = ($flags & (1 << 1)) ? true : null;
        $pattern = ($flags & (1 << 3)) ? true : null;
        $dark = ($flags & (1 << 4)) ? true : null;
        $accessHash = Deserializer::int64($stream);
        $slug = Deserializer::bytes($stream);
        $document = AbstractDocument::deserialize($stream);
        $settings = ($flags & (1 << 2)) ? WallPaperSettings::deserialize($stream) : null;

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