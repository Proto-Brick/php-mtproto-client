<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Upload;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWebFileLocation;
use ProtoBrick\MTProtoClient\Generated\Types\Upload\WebFile;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/upload.getWebFile
 */
final class GetWebFileRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x24e6818d;
    
    public string $predicate = 'upload.getWebFile';
    
    public function getMethodName(): string
    {
        return 'upload.getWebFile';
    }
    
    public function getResponseClass(): string
    {
        return WebFile::class;
    }
    /**
     * @param AbstractInputWebFileLocation $location
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputWebFileLocation $location,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->location->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}