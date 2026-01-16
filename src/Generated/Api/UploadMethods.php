<?php declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Generated\Api;

use Amp\Future;
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
     * @return Future<bool>
     * @see https://core.telegram.org/method/upload.saveFilePart
     * @api
     */
    public function saveFilePartAsync(int $fileId, int $filePart, string $bytes): Future
    {
        return $this->client->call(new SaveFilePartRequest(fileId: $fileId, filePart: $filePart, bytes: $bytes));
    }

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
        return (bool) $this->saveFilePartAsync(fileId: $fileId, filePart: $filePart, bytes: $bytes)->await();
    }

    /**
     * @param InputFileLocation|InputEncryptedFileLocation|InputDocumentFileLocation|InputSecureFileLocation|InputTakeoutFileLocation|InputPhotoFileLocation|InputPhotoLegacyFileLocation|InputPeerPhotoFileLocation|InputStickerSetThumb|InputGroupCallStream $location
     * @param int $offset
     * @param int $limit
     * @param bool|null $precise
     * @param bool|null $cdnSupported
     * @return Future<File|FileCdnRedirect|null>
     * @see https://core.telegram.org/method/upload.getFile
     * @api
     */
    public function getFileAsync(AbstractInputFileLocation $location, int $offset, int $limit, ?bool $precise = null, ?bool $cdnSupported = null): Future
    {
        return $this->client->call(new GetFileRequest(location: $location, offset: $offset, limit: $limit, precise: $precise, cdnSupported: $cdnSupported));
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
        return $this->getFileAsync(location: $location, offset: $offset, limit: $limit, precise: $precise, cdnSupported: $cdnSupported)->await();
    }

    /**
     * @param int $fileId
     * @param int $filePart
     * @param int $fileTotalParts
     * @param string $bytes
     * @return Future<bool>
     * @see https://core.telegram.org/method/upload.saveBigFilePart
     * @api
     */
    public function saveBigFilePartAsync(int $fileId, int $filePart, int $fileTotalParts, string $bytes): Future
    {
        return $this->client->call(new SaveBigFilePartRequest(fileId: $fileId, filePart: $filePart, fileTotalParts: $fileTotalParts, bytes: $bytes));
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
        return (bool) $this->saveBigFilePartAsync(fileId: $fileId, filePart: $filePart, fileTotalParts: $fileTotalParts, bytes: $bytes)->await();
    }

    /**
     * @param InputWebFileLocation|InputWebFileGeoPointLocation|InputWebFileAudioAlbumThumbLocation $location
     * @param int $offset
     * @param int $limit
     * @return Future<WebFile|null>
     * @see https://core.telegram.org/method/upload.getWebFile
     * @api
     */
    public function getWebFileAsync(AbstractInputWebFileLocation $location, int $offset, int $limit): Future
    {
        return $this->client->call(new GetWebFileRequest(location: $location, offset: $offset, limit: $limit));
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
        return $this->getWebFileAsync(location: $location, offset: $offset, limit: $limit)->await();
    }

    /**
     * @param string $fileToken
     * @param int $offset
     * @param int $limit
     * @return Future<CdnFileReuploadNeeded|CdnFile|null>
     * @see https://core.telegram.org/method/upload.getCdnFile
     * @api
     */
    public function getCdnFileAsync(string $fileToken, int $offset, int $limit): Future
    {
        return $this->client->call(new GetCdnFileRequest(fileToken: $fileToken, offset: $offset, limit: $limit));
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
        return $this->getCdnFileAsync(fileToken: $fileToken, offset: $offset, limit: $limit)->await();
    }

    /**
     * @param string $fileToken
     * @param string $requestToken
     * @return Future<list<FileHash>>
     * @see https://core.telegram.org/method/upload.reuploadCdnFile
     * @api
     */
    public function reuploadCdnFileAsync(string $fileToken, string $requestToken): Future
    {
        return $this->client->call(new ReuploadCdnFileRequest(fileToken: $fileToken, requestToken: $requestToken));
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
        return $this->reuploadCdnFileAsync(fileToken: $fileToken, requestToken: $requestToken)->await();
    }

    /**
     * @param string $fileToken
     * @param int $offset
     * @return Future<list<FileHash>>
     * @see https://core.telegram.org/method/upload.getCdnFileHashes
     * @api
     */
    public function getCdnFileHashesAsync(string $fileToken, int $offset): Future
    {
        return $this->client->call(new GetCdnFileHashesRequest(fileToken: $fileToken, offset: $offset));
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
        return $this->getCdnFileHashesAsync(fileToken: $fileToken, offset: $offset)->await();
    }

    /**
     * @param InputFileLocation|InputEncryptedFileLocation|InputDocumentFileLocation|InputSecureFileLocation|InputTakeoutFileLocation|InputPhotoFileLocation|InputPhotoLegacyFileLocation|InputPeerPhotoFileLocation|InputStickerSetThumb|InputGroupCallStream $location
     * @param int $offset
     * @return Future<list<FileHash>>
     * @see https://core.telegram.org/method/upload.getFileHashes
     * @api
     */
    public function getFileHashesAsync(AbstractInputFileLocation $location, int $offset): Future
    {
        return $this->client->call(new GetFileHashesRequest(location: $location, offset: $offset));
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
        return $this->getFileHashesAsync(location: $location, offset: $offset)->await();
    }
}