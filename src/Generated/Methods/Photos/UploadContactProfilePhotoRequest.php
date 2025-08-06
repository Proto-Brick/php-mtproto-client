<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Photos;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractVideoSize;
use DigitalStars\MtprotoClient\Generated\Types\Photos\Photo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/photos.uploadContactProfilePhoto
 */
final class UploadContactProfilePhotoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe14c4a71;
    
    public string $_ = 'photos.uploadContactProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'photos.uploadContactProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return Photo::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param bool|null $suggest
     * @param bool|null $save
     * @param AbstractInputFile|null $file
     * @param AbstractInputFile|null $video
     * @param float|null $videoStartTs
     * @param AbstractVideoSize|null $videoEmojiMarkup
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly ?bool $suggest = null,
        public readonly ?bool $save = null,
        public readonly ?AbstractInputFile $file = null,
        public readonly ?AbstractInputFile $video = null,
        public readonly ?float $videoStartTs = null,
        public readonly ?AbstractVideoSize $videoEmojiMarkup = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->suggest) $flags |= (1 << 3);
        if ($this->save) $flags |= (1 << 4);
        if ($this->file !== null) $flags |= (1 << 0);
        if ($this->video !== null) $flags |= (1 << 1);
        if ($this->videoStartTs !== null) $flags |= (1 << 2);
        if ($this->videoEmojiMarkup !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->userId->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->file->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->video->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->videoEmojiMarkup->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}