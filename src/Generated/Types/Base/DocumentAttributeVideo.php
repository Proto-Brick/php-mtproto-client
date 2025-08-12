<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeVideo
 */
final class DocumentAttributeVideo extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x43c57c48;
    
    public string $predicate = 'documentAttributeVideo';
    
    /**
     * @param float $duration
     * @param int $w
     * @param int $h
     * @param true|null $roundMessage
     * @param true|null $supportsStreaming
     * @param true|null $nosound
     * @param int|null $preloadPrefixSize
     * @param float|null $videoStartTs
     * @param string|null $videoCodec
     */
    public function __construct(
        public readonly float $duration,
        public readonly int $w,
        public readonly int $h,
        public readonly ?true $roundMessage = null,
        public readonly ?true $supportsStreaming = null,
        public readonly ?true $nosound = null,
        public readonly ?int $preloadPrefixSize = null,
        public readonly ?float $videoStartTs = null,
        public readonly ?string $videoCodec = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->roundMessage) $flags |= (1 << 0);
        if ($this->supportsStreaming) $flags |= (1 << 1);
        if ($this->nosound) $flags |= (1 << 3);
        if ($this->preloadPrefixSize !== null) $flags |= (1 << 2);
        if ($this->videoStartTs !== null) $flags |= (1 << 4);
        if ($this->videoCodec !== null) $flags |= (1 << 5);
        $buffer .= Serializer::int32($flags);
        $buffer .= pack('d', $this->duration);
        $buffer .= Serializer::int32($this->w);
        $buffer .= Serializer::int32($this->h);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->preloadPrefixSize);
        }
        if ($flags & (1 << 4)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::bytes($this->videoCodec);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $roundMessage = ($flags & (1 << 0)) ? true : null;
        $supportsStreaming = ($flags & (1 << 1)) ? true : null;
        $nosound = ($flags & (1 << 3)) ? true : null;
        $duration = Deserializer::double($stream);
        $w = Deserializer::int32($stream);
        $h = Deserializer::int32($stream);
        $preloadPrefixSize = ($flags & (1 << 2)) ? Deserializer::int32($stream) : null;
        $videoStartTs = ($flags & (1 << 4)) ? Deserializer::double($stream) : null;
        $videoCodec = ($flags & (1 << 5)) ? Deserializer::bytes($stream) : null;

        return new self(
            $duration,
            $w,
            $h,
            $roundMessage,
            $supportsStreaming,
            $nosound,
            $preloadPrefixSize,
            $videoStartTs,
            $videoCodec
        );
    }
}