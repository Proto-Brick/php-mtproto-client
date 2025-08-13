<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.saveFilePart
 */
final class SaveFilePartRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb304a621;
    
    public string $predicate = 'upload.saveFilePart';
    
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
}