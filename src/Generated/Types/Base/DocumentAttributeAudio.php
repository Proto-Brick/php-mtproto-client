<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/documentAttributeAudio
 */
final class DocumentAttributeAudio extends AbstractDocumentAttribute
{
    public const CONSTRUCTOR_ID = 0x9852f9c6;
    
    public string $_ = 'documentAttributeAudio';
    
    /**
     * @param int $duration
     * @param bool|null $voice
     * @param string|null $title
     * @param string|null $performer
     * @param string|null $waveform
     */
    public function __construct(
        public readonly int $duration,
        public readonly ?bool $voice = null,
        public readonly ?string $title = null,
        public readonly ?string $performer = null,
        public readonly ?string $waveform = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->voice) $flags |= (1 << 10);
        if ($this->title !== null) $flags |= (1 << 0);
        if ($this->performer !== null) $flags |= (1 << 1);
        if ($this->waveform !== null) $flags |= (1 << 2);
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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $voice = ($flags & (1 << 10)) ? true : null;
        $duration = Deserializer::int32($stream);
        $title = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $performer = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $waveform = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        return new self(
            $duration,
            $voice,
            $title,
            $performer,
            $waveform
        );
    }
}