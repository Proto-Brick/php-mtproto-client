<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Base\FileHash;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.getCdnFileHashes
 */
final class GetCdnFileHashesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x91dc3f31;
    
    public string $predicate = 'upload.getCdnFileHashes';
    
    public function getMethodName(): string
    {
        return 'upload.getCdnFileHashes';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FileHash::class . '>';
    }
    /**
     * @param string $fileToken
     * @param int $offset
     */
    public function __construct(
        public readonly string $fileToken,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->fileToken);
        $buffer .= Serializer::int64($this->offset);
        return $buffer;
    }
}