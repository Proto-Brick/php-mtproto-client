<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Photos;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractVideoSize;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\Photo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/photos.uploadProfilePhoto
 */
final class UploadProfilePhotoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x388a3b5;
    
    public string $predicate = 'photos.uploadProfilePhoto';
    
    public function getMethodName(): string
    {
        return 'photos.uploadProfilePhoto';
    }
    
    public function getResponseClass(): string
    {
        return Photo::class;
    }
    /**
     * @param true|null $fallback
     * @param AbstractInputUser|null $bot
     * @param AbstractInputFile|null $file
     * @param AbstractInputFile|null $video
     * @param float|null $videoStartTs
     * @param AbstractVideoSize|null $videoEmojiMarkup
     */
    public function __construct(
        public readonly ?true $fallback = null,
        public readonly ?AbstractInputUser $bot = null,
        public readonly ?AbstractInputFile $file = null,
        public readonly ?AbstractInputFile $video = null,
        public readonly ?float $videoStartTs = null,
        public readonly ?AbstractVideoSize $videoEmojiMarkup = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->fallback) {
            $flags |= (1 << 3);
        }
        if ($this->bot !== null) {
            $flags |= (1 << 5);
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
            $flags |= (1 << 4);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 5)) {
            $buffer .= $this->bot->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= $this->file->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->video->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= pack('d', $this->videoStartTs);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->videoEmojiMarkup->serialize();
        }
        return $buffer;
    }
}