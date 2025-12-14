<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/videoSize
 */
final class VideoSize extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 0xde33b094;
    
    public string $predicate = 'videoSize';
    
    /**
     * @param string $type
     * @param int $w
     * @param int $h
     * @param int $size
     * @param float|null $videoStartTs
     */
    public function __construct(
        public readonly string $type,
        public readonly int $w,
        public readonly int $h,
        public readonly int $size,
        public readonly ?float $videoStartTs = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->videoStartTs !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        $buffer .= Serializer::int32($this->size);
        if ($flags & (1 << 0)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $type = Deserializer::bytes($stream);
        $w = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $h = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $size = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $videoStartTs = (($flags & (1 << 0)) !== 0) ? Deserializer::double($stream) : null;

        return new self(
            $type,
            $w,
            $h,
            $size,
            $videoStartTs
        );
    }
}