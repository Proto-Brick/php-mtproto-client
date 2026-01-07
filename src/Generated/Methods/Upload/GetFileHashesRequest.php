<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Base\FileHash;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.getFileHashes
 */
final class GetFileHashesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9156982a;
    
    public string $predicate = 'upload.getFileHashes';
    
    public function getMethodName(): string
    {
        return 'upload.getFileHashes';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . FileHash::class . '>';
    }
    /**
     * @param AbstractInputFileLocation $location
     * @param int $offset
     */
    public function __construct(
        public readonly AbstractInputFileLocation $location,
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->location->serialize();
        $buffer .= Serializer::int64($this->offset);
        return $buffer;
    }
}