<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputChatUploadedPhoto
 */
final class InputChatUploadedPhoto extends AbstractInputChatPhoto
{
    public const CONSTRUCTOR_ID = 0xbdcdaec0;
    
    public string $_ = 'inputChatUploadedPhoto';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->file !== null) $flags |= (1 << 0);
        if ($this->video !== null) $flags |= (1 << 1);
        if ($this->videoStartTs !== null) $flags |= (1 << 2);
        if ($this->videoEmojiMarkup !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $this->file->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->video->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->videoEmojiMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $file = ($flags & (1 << 0)) ? AbstractInputFile::deserialize($deserializer, $stream) : null;
        $video = ($flags & (1 << 1)) ? AbstractInputFile::deserialize($deserializer, $stream) : null;
        $videoStartTs = ($flags & (1 << 2)) ? $deserializer->double($stream) : null;
        $videoEmojiMarkup = ($flags & (1 << 3)) ? AbstractVideoSize::deserialize($deserializer, $stream) : null;
        return new self(
            $file,
            $video,
            $videoStartTs,
            $videoEmojiMarkup
        );
    }
}