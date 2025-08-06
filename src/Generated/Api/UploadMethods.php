<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\GetCdnFileHashesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\GetCdnFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\GetFileHashesRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\GetFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\GetWebFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\ReuploadCdnFileRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\SaveBigFilePartRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Upload\SaveFilePartRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputWebFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\FileHash;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputDocumentFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputEncryptedFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputGroupCallStream;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerPhotoFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhotoFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhotoLegacyFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputSecureFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputStickerSetThumb;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputTakeoutFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWebFileAudioAlbumThumbLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWebFileGeoPointLocation;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputWebFileLocation;
use DigitalStars\MtprotoClient\Generated\Types\Upload\AbstractCdnFile;
use DigitalStars\MtprotoClient\Generated\Types\Upload\AbstractFile;
use DigitalStars\MtprotoClient\Generated\Types\Upload\CdnFile;
use DigitalStars\MtprotoClient\Generated\Types\Upload\CdnFileReuploadNeeded;
use DigitalStars\MtprotoClient\Generated\Types\Upload\File;
use DigitalStars\MtprotoClient\Generated\Types\Upload\FileCdnRedirect;
use DigitalStars\MtprotoClient\Generated\Types\Upload\WebFile;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "upload" group.
 */
final readonly class UploadMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param int $fileId
     * @param int $filePart
     * @param string $bytes
     * @return bool
     * @see https://core.telegram.org/method/upload.saveFilePart
     * @api
     */
    public function saveFilePart(int $fileId, int $filePart, string $bytes): bool
    {
        return (bool) $this->client->callSync(new SaveFilePartRequest($fileId, $filePart, $bytes));
    }

    /**
     * @param InputFileLocation|InputEncryptedFileLocation|InputDocumentFileLocation|InputSecureFileLocation|InputTakeoutFileLocation|InputPhotoFileLocation|InputPhotoLegacyFileLocation|InputPeerPhotoFileLocation|InputStickerSetThumb|InputGroupCallStream $location
     * @param int $offset
     * @param int $limit
     * @param bool|null $precise
     * @param bool|null $cdnSupported
     * @return File|FileCdnRedirect|null
     * @see https://core.telegram.org/method/upload.getFile
     * @api
     */
    public function getFile(AbstractInputFileLocation $location, int $offset, int $limit, ?bool $precise = null, ?bool $cdnSupported = null): ?AbstractFile
    {
        return $this->client->callSync(new GetFileRequest($location, $offset, $limit, $precise, $cdnSupported));
    }

    /**
     * @param int $fileId
     * @param int $filePart
     * @param int $fileTotalParts
     * @param string $bytes
     * @return bool
     * @see https://core.telegram.org/method/upload.saveBigFilePart
     * @api
     */
    public function saveBigFilePart(int $fileId, int $filePart, int $fileTotalParts, string $bytes): bool
    {
        return (bool) $this->client->callSync(new SaveBigFilePartRequest($fileId, $filePart, $fileTotalParts, $bytes));
    }

    /**
     * @param InputWebFileLocation|InputWebFileGeoPointLocation|InputWebFileAudioAlbumThumbLocation $location
     * @param int $offset
     * @param int $limit
     * @return WebFile|null
     * @see https://core.telegram.org/method/upload.getWebFile
     * @api
     */
    public function getWebFile(AbstractInputWebFileLocation $location, int $offset, int $limit): ?WebFile
    {
        return $this->client->callSync(new GetWebFileRequest($location, $offset, $limit));
    }

    /**
     * @param string $fileToken
     * @param int $offset
     * @param int $limit
     * @return CdnFileReuploadNeeded|CdnFile|null
     * @see https://core.telegram.org/method/upload.getCdnFile
     * @api
     */
    public function getCdnFile(string $fileToken, int $offset, int $limit): ?AbstractCdnFile
    {
        return $this->client->callSync(new GetCdnFileRequest($fileToken, $offset, $limit));
    }

    /**
     * @param string $fileToken
     * @param string $requestToken
     * @return list<FileHash>
     * @see https://core.telegram.org/method/upload.reuploadCdnFile
     * @api
     */
    public function reuploadCdnFile(string $fileToken, string $requestToken): array
    {
        return $this->client->callSync(new ReuploadCdnFileRequest($fileToken, $requestToken));
    }

    /**
     * @param string $fileToken
     * @param int $offset
     * @return list<FileHash>
     * @see https://core.telegram.org/method/upload.getCdnFileHashes
     * @api
     */
    public function getCdnFileHashes(string $fileToken, int $offset): array
    {
        return $this->client->callSync(new GetCdnFileHashesRequest($fileToken, $offset));
    }

    /**
     * @param InputFileLocation|InputEncryptedFileLocation|InputDocumentFileLocation|InputSecureFileLocation|InputTakeoutFileLocation|InputPhotoFileLocation|InputPhotoLegacyFileLocation|InputPeerPhotoFileLocation|InputStickerSetThumb|InputGroupCallStream $location
     * @param int $offset
     * @return list<FileHash>
     * @see https://core.telegram.org/method/upload.getFileHashes
     * @api
     */
    public function getFileHashes(AbstractInputFileLocation $location, int $offset): array
    {
        return $this->client->callSync(new GetFileHashesRequest($location, $offset));
    }
}