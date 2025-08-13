<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\AbstractFile;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.getFile
 */
final class GetFileRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbe5335be;
    
    public string $predicate = 'upload.getFile';
    
    public function getMethodName(): string
    {
        return 'upload.getFile';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFile::class;
    }
    /**
     * @param AbstractInputFileLocation $location
     * @param int $offset
     * @param int $limit
     * @param true|null $precise
     * @param true|null $cdnSupported
     */
    public function __construct(
        public readonly AbstractInputFileLocation $location,
        public readonly int $offset,
        public readonly int $limit,
        public readonly ?true $precise = null,
        public readonly ?true $cdnSupported = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->precise) {
            $flags |= (1 << 0);
        }
        if ($this->cdnSupported) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->location->serialize();
        $buffer .= Serializer::int64($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}