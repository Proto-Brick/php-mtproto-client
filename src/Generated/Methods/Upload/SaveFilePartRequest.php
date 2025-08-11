<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Upload;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/upload.saveFilePart
 */
final class SaveFilePartRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb304a621;
    
    public string $_ = 'upload.saveFilePart';
    
    public function getMethodName(): string
    {
        return 'upload.saveFilePart';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $fileId
     * @param int $filePart
     * @param string $bytes
     */
    public function __construct(
        public readonly int $fileId,
        public readonly int $filePart,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->fileId);
        $buffer .= Serializer::int32($this->filePart);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}