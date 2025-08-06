<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Upload;

use DigitalStars\MtprotoClient\Generated\Types\Storage\AbstractFileType;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/upload.webFile
 */
final class WebFile extends TlObject
{
    public const CONSTRUCTOR_ID = 0x21e753bc;
    
    public string $_ = 'upload.webFile';
    
    /**
     * @param int $size
     * @param string $mimeType
     * @param AbstractFileType $fileType
     * @param int $mtime
     * @param string $bytes
     */
    public function __construct(
        public readonly int $size,
        public readonly string $mimeType,
        public readonly AbstractFileType $fileType,
        public readonly int $mtime,
        public readonly string $bytes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->size);
        $buffer .= $serializer->bytes($this->mimeType);
        $buffer .= $this->fileType->serialize($serializer);
        $buffer .= $serializer->int32($this->mtime);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $size = $deserializer->int32($stream);
        $mimeType = $deserializer->bytes($stream);
        $fileType = AbstractFileType::deserialize($deserializer, $stream);
        $mtime = $deserializer->int32($stream);
        $bytes = $deserializer->bytes($stream);
        return new self(
            $size,
            $mimeType,
            $fileType,
            $mtime,
            $bytes
        );
    }
}