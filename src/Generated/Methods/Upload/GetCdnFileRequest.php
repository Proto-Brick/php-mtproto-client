<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Upload\AbstractCdnFile;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.getCdnFile
 */
final class GetCdnFileRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x395f69da;
    
    public string $predicate = 'upload.getCdnFile';
    
    public function getMethodName(): string
    {
        return 'upload.getCdnFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCdnFile::class;
    }
    /**
     * @param string $fileToken
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly string $fileToken,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->fileToken);
        $buffer .= Serializer::int64($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}