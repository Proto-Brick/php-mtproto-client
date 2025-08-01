<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.saveBigFilePart
 */
final class SaveBigFilePartRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3732629309;
    
    public string $_ = 'upload.saveBigFilePart';
    
    public function getMethodName(): string
    {
        return 'upload.saveBigFilePart';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $fileId
     * @param int $filePart
     * @param int $fileTotalParts
     * @param string $bytes
     */
    public function __construct(
        public readonly int $fileId,
        public readonly int $filePart,
        public readonly int $fileTotalParts,
        public readonly string $bytes
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->fileId);
        $buffer .= $serializer->int32($this->filePart);
        $buffer .= $serializer->int32($this->fileTotalParts);
        $buffer .= $serializer->bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}