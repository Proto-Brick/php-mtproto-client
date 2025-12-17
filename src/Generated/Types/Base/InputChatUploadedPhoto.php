<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputChatUploadedPhoto
 */
final class InputChatUploadedPhoto extends AbstractInputChatPhoto
{
    public const CONSTRUCTOR_ID = 0xbdcdaec0;
    
    public string $predicate = 'inputChatUploadedPhoto';
    
    /**
     * @param AbstractInputFile|null $file
     * @param AbstractInputFile|null $video
     * @param float|null $videoStartTs
     * @param AbstractVideoSize|null $videoEmojiMarkup
     */
    public function __construct(
        public readonly ?AbstractInputFile $file = null,
        public readonly ?AbstractInputFile $video = null,
        public readonly ?float $videoStartTs = null,
        public readonly ?AbstractVideoSize $videoEmojiMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->file !== null) {
            $flags |= (1 << 0);
        }
        if ($this->video !== null) {
            $flags |= (1 << 1);
        }
        if ($this->videoStartTs !== null) {
            $flags |= (1 << 2);
        }
        if ($this->videoEmojiMarkup !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->file->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->video->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->videoEmojiMarkup->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $file = (($flags & (1 << 0)) !== 0) ? AbstractInputFile::deserialize($__payload, $__offset) : null;
        $video = (($flags & (1 << 1)) !== 0) ? AbstractInputFile::deserialize($__payload, $__offset) : null;
        $videoStartTs = (($flags & (1 << 2)) !== 0) ? Deserializer::double($__payload, $__offset) : null;
        $videoEmojiMarkup = (($flags & (1 << 3)) !== 0) ? AbstractVideoSize::deserialize($__payload, $__offset) : null;

        return new self(
            $file,
            $video,
            $videoStartTs,
            $videoEmojiMarkup
        );
    }
}