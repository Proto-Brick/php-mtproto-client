<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.saveBigFilePart
 */
final class SaveBigFilePartRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xde7b673d;
    
    public string $predicate = 'upload.saveBigFilePart';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->fileId);
        $buffer .= Serializer::int32($this->filePart);
        $buffer .= Serializer::int32($this->fileTotalParts);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
}