<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Generated\Types\Storage;

use DigitalStars\MtprotoClient\TL\Contracts\TlObjectInterface;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/storage.FileType
 */
enum FileType: int implements TlObjectInterface
{
    case FileUnknown = 0xaa963b05;
    case FilePartial = 0x40bc6f52;
    case FileJpeg = 0x7efe0e;
    case FileGif = 0xcae1aadf;
    case FilePng = 0xa4f63c0;
    case FilePdf = 0xae1e508d;
    case FileMp3 = 0x528a0677;
    case FileMov = 0x4b09ebbc;
    case FileMp4 = 0xb3cea0e4;
    case FileWebp = 0x1081464c;

    public function serialize(): string
    {
        return Serializer::int32($this->value);
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        try {
            return self::from($constructorId);
        } catch (\ValueError $e) {
            throw new RuntimeException(sprintf(
                'Unknown constructor ID for enum %s. Received ID: 0x%s (signed: %d)',
                self::class,
                dechex(unpack('V', pack('l', $constructorId))[1]),
                $constructorId
            ), 0, $e);
        }
    }
    
    public function getConstructorId(): int
    {
        return $this->value;
    }
    
    public function getPredicate(): string
    {
        return match($this) {
            self::FileUnknown => 'storage.fileUnknown',
            self::FilePartial => 'storage.filePartial',
            self::FileJpeg => 'storage.fileJpeg',
            self::FileGif => 'storage.fileGif',
            self::FilePng => 'storage.filePng',
            self::FilePdf => 'storage.filePdf',
            self::FileMp3 => 'storage.fileMp3',
            self::FileMov => 'storage.fileMov',
            self::FileMp4 => 'storage.fileMp4',
            self::FileWebp => 'storage.fileWebp',
        };
    }
}