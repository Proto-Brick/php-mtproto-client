<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Photos;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractVideoSize;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\Photo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/photos.uploadContactProfilePhoto
 */
final class UploadContactProfilePhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe14c4a71;
    
    public string $predicate = 'photos.uploadContactProfilePhoto';
    
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
     * @param true|null $suggest
     * @param true|null $save
     * @param AbstractInputFile|null $file
     * @param AbstractInputFile|null $video
     * @param float|null $videoStartTs
     * @param AbstractVideoSize|null $videoEmojiMarkup
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly ?true $suggest = null,
        public readonly ?true $save = null,
        public readonly ?AbstractInputFile $file = null,
        public readonly ?AbstractInputFile $video = null,
        public readonly ?float $videoStartTs = null,
        public readonly ?AbstractVideoSize $videoEmojiMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->suggest) {
            $flags |= (1 << 3);
        }
        if ($this->save) {
            $flags |= (1 << 4);
        }
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
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->userId->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->file->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->video->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->videoEmojiMarkup->serialize();
        }
        return $buffer;
    }
}