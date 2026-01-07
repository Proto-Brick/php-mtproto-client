<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/wallPaperNoFile
 */
final class WallPaperNoFile extends AbstractWallPaper
{
    public const CONSTRUCTOR_ID = 0xe0804116;
    
    public string $predicate = 'wallPaperNoFile';
    
    /**
     * @param int $id
     * @param true|null $default_
     * @param true|null $dark
     * @param WallPaperSettings|null $settings
     */
    public function __construct(
        public readonly int $id,
        public readonly ?true $default_ = null,
        public readonly ?true $dark = null,
        public readonly ?WallPaperSettings $settings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->default_) {
            $flags |= (1 << 1);
        }
        if ($this->dark) {
            $flags |= (1 << 4);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);
        $flags = Deserializer::int32($__payload, $__offset);
        $default_ = (($flags & (1 << 1)) !== 0) ? true : null;
        $dark = (($flags & (1 << 4)) !== 0) ? true : null;
        $settings = (($flags & (1 << 2)) !== 0) ? WallPaperSettings::deserialize($__payload, $__offset) : null;

        return new self(
            $id,
            $default_,
            $dark,
            $settings
        );
    }
}