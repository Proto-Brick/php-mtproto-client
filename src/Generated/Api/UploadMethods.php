<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\GetCdnFileHashesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\GetCdnFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\GetFileHashesRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\GetFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\GetWebFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\ReuploadCdnFileRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\SaveBigFilePartRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Upload\SaveFilePartRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWebFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\FileHash;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputDocumentFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputEncryptedFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputGroupCallStream;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerPhotoFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhotoFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPhotoLegacyFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputSecureFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputStickerSetThumb;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputTakeoutFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWebFileAudioAlbumThumbLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWebFileGeoPointLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputWebFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\AbstractCdnFile;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\AbstractFile;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\CdnFile;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\CdnFileReuploadNeeded;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\File;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\FileCdnRedirect;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\WebFile;


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