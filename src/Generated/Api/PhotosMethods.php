<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Photos\DeletePhotosRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Photos\GetUserPhotosRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Photos\UpdateProfilePhotoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Photos\UploadContactProfilePhotoRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Photos\UploadProfilePhotoRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractVideoSize;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileBig;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileStoryDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoto;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhotoEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\VideoSize;
use DigitalStars\MtprotoClient\Generated\Types\Base\VideoSizeEmojiMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Base\VideoSizeStickerMarkup;
use DigitalStars\MtprotoClient\Generated\Types\Photos\AbstractPhotos;
use DigitalStars\MtprotoClient\Generated\Types\Photos\Photo;
use DigitalStars\MtprotoClient\Generated\Types\Photos\Photos;
use DigitalStars\MtprotoClient\Generated\Types\Photos\PhotosSlice;


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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $bot
     * @return Photo|null
     * @see https://core.telegram.org/method/photos.updateProfilePhoto
     * @api
     */
    public function updateProfilePhoto(AbstractInputPhoto $id, ?bool $fallback = null, ?AbstractInputUser $bot = null): ?Photo
    {
        return $this->client->callSync(new UpdateProfilePhotoRequest($id, $fallback, $bot));
    }

    /**
     * @param bool|null $fallback
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage|null $bot
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $file
     * @param InputFile|InputFileBig|InputFileStoryDocument|null $video
     * @param float|null $videoStartTs
     * @param VideoSize|VideoSizeEmojiMarkup|VideoSizeStickerMarkup|null $videoEmojiMarkup
     * @return Photo|null
     * @see https://core.telegram.org/method/photos.uploadProfilePhoto
     * @api
     */
    public function uploadProfilePhoto(?bool $fallback = null, ?AbstractInputUser $bot = null, ?AbstractInputFile $file = null, ?AbstractInputFile $video = null, ?float $videoStartTs = null, ?AbstractVideoSize $videoEmojiMarkup = null): ?Photo
    {
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
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
     * @param int $offset
     * @param int $maxId
     * @param int $limit
     * @return Photos|PhotosSlice|null
     * @see https://core.telegram.org/method/photos.getUserPhotos
     * @api
     */
    public function getUserPhotos(AbstractInputUser $userId, int $offset, int $maxId, int $limit): ?AbstractPhotos
    {
        return $this->client->callSync(new GetUserPhotosRequest($userId, $offset, $maxId, $limit));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $userId
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
    public function uploadContactProfilePhoto(AbstractInputUser $userId, ?bool $suggest = null, ?bool $save = null, ?AbstractInputFile $file = null, ?AbstractInputFile $video = null, ?float $videoStartTs = null, ?AbstractVideoSize $videoEmojiMarkup = null): ?Photo
    {
        return $this->client->callSync(new UploadContactProfilePhotoRequest($userId, $suggest, $save, $file, $video, $videoStartTs, $videoEmojiMarkup));
    }
}