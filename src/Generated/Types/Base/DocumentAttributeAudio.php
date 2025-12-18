<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/documentAttributeAudio
 */
final class DocumentAttributeAudio extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x9852f9c6;
    
    public string $predicate = 'documentAttributeAudio';
    
    /**
     * @param int $duration
     * @param true|null $voice
     * @param string|null $title
     * @param string|null $performer
     * @param string|null $waveform
     */
    public function __construct(
        public readonly int $duration,
        public readonly ?true $voice = null,
        public readonly ?string $title = null,
        public readonly ?string $performer = null,
        public readonly ?string $waveform = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->voice) {
            $flags |= (1 << 10);
        }
        if ($this->title !== null) {
            $flags |= (1 << 0);
        }
        if ($this->performer !== null) {
            $flags |= (1 << 1);
        }
        if ($this->waveform !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->duration);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->performer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->waveform);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $voice = (($flags & (1 << 10)) !== 0) ? true : null;
        $duration = Deserializer::int32($__payload, $__offset);
        $title = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $performer = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $waveform = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $duration,
            $voice,
            $title,
            $performer,
            $waveform
        );
    }
}