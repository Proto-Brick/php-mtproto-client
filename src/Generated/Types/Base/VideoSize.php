<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/videoSize
 */
final class VideoSize extends AbstractVideoSize
{
    public const CONSTRUCTOR_ID = 0xde33b094;
    
    public string $_ = 'videoSize';
    
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
        if ($this->videoStartTs !== null) $flags |= (1 << 0);
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
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $type = Deserializer::bytes($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        $size = Deserializer::int32($stream);
        $videoStartTs = ($flags & (1 << 0)) ? Deserializer::double($stream) : null;
        return new self(
            $type,
            $w,
            $h,
            $size,
            $videoStartTs
        );
    }
}