<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->creator) {
            $flags |= (1 << 0);
        }
        if ($this->default_) {
            $flags |= (1 << 1);
        }
        if ($this->pattern) {
            $flags |= (1 << 3);
        }
        if ($this->dark) {
            $flags |= (1 << 4);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 2);
        }
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
        $id = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $creator = (($flags & (1 << 0)) !== 0) ? true : null;
        $default_ = (($flags & (1 << 1)) !== 0) ? true : null;
        $pattern = (($flags & (1 << 3)) !== 0) ? true : null;
        $dark = (($flags & (1 << 4)) !== 0) ? true : null;
        $accessHash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $slug = Deserializer::bytes($stream);
        $document = AbstractDocument::deserialize($stream);
        $settings = (($flags & (1 << 2)) !== 0) ? WallPaperSettings::deserialize($stream) : null;

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