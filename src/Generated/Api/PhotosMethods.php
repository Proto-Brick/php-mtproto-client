<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Photos\DeletePhotosRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Photos\GetUserPhotosRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Photos\UpdateProfilePhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Photos\UploadContactProfilePhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Photos\UploadProfilePhotoRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractVideoSize;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileBig;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileStoryDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhotoEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\VideoSize;
use ProtoBrick\MTProtoClient\Generated\Types\Base\VideoSizeEmojiMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Base\VideoSizeStickerMarkup;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\AbstractPhotos;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\Photo;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\Photos;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\PhotosSlice;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "photos" group.
 */
final readonly class PhotosMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param InputPhotoEmpty|InputPhoto $id
     * @param bool|null $fallback
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $bot
     * @return Photo|null
     * @see https://core.telegram.org/method/photos.updateProfilePhoto
     * @api
     */
    public function updateProfilePhoto(AbstractInputPhoto $id, ?bool $fallback = null, AbstractInputUser|string|int|null $bot = null): ?Photo
    {
        if (is_string($bot) || is_int($bot)) {
            $bot = $this->client->peerManager->resolve($bot);
        }
        return $this->client->callSync(new UpdateProfilePhotoRequest($id, $fallback, $bot));
    }

    /**
     * @param bool|null $fallback
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int|null $bot
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $file
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $video
     * @param float|null $videoStartTs
     * @param VideoSize|VideoSizeEmojiMarkup|VideoSizeStickerMarkup|null $videoEmojiMarkup
     * @return Photo|null
     * @see https://core.telegram.org/method/photos.uploadProfilePhoto
     * @api
     */
    public function uploadProfilePhoto(?bool $fallback = null, AbstractInputUser|string|int|null $bot = null, ?AbstractInputFile $file = null, ?AbstractInputFile $video = null, ?float $videoStartTs = null, ?AbstractVideoSize $videoEmojiMarkup = null): ?Photo
    {
        if (is_string($bot) || is_int($bot)) {
            $bot = $this->client->peerManager->resolve($bot);
        }
        return $this->client->callSync(new UploadProfilePhotoRequest($fallback, $bot, $file, $video, $videoStartTs, $videoEmojiMarkup));
    }

    /**
     * @param list<InputPhotoEmpty|InputPhoto> $id
     * @return list<int>
     * @see https://core.telegram.org/method/photos.deletePhotos
     * @api
     */
    public function deletePhotos(array $id): array
    {
        return $this->client->callSync(new DeletePhotosRequest($id));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param int $offset
     * @param int $maxId
     * @param int $limit
     * @return Photos|PhotosSlice|null
     * @see https://core.telegram.org/method/photos.getUserPhotos
     * @api
     */
    public function getUserPhotos(AbstractInputUser|string|int $userId, int $offset, int $maxId, int $limit): ?AbstractPhotos
    {
        if (is_string($userId) || is_int($userId)) {
            $userId = $this->client->peerManager->resolve($userId);
        }
        return $this->client->callSync(new GetUserPhotosRequest($userId, $offset, $maxId, $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|string|int $userId
     * @param bool|null $suggest
     * @param bool|null $save
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $file
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $video
     * @param float|null $videoStartTs
     * @param VideoSize|VideoSizeEmojiMarkup|VideoSizeStickerMarkup|null $videoEmojiMarkup
     * @return Photo|null
     * @see https://core.telegram.org/method/photos.uploadContactProfilePhoto
     * @api
     */
    public function uploadContactProfilePhoto(AbstractInputUser|string|int $userId, ?bool $suggest = null, ?bool $save = null, ?AbstractInputFile $file = null, ?AbstractInputFile $video = null, ?float $videoStartTs = null, ?AbstractVideoSize $videoEmojiMarkup = null): ?Photo
    {
        if (is_string($userId) || is_int($userId)) {
            $userId = $this->client->peerManager->resolve($userId);
        }
        return $this->client->callSync(new UploadContactProfilePhotoRequest($userId, $suggest, $save, $file, $video, $videoStartTs, $videoEmojiMarkup));
    }
}