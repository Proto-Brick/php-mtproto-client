<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDocumentByHash
 */
final class GetDocumentByHashRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb1f2061f;
    
    public string $predicate = 'messages.getDocumentByHash';
    
    public function getMethodName(): string
    {
        return 'messages.getDocumentByHash';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param string $sha256
     * @param int $size
     * @param string $mimeType
     */
    public function __construct(
        public readonly string $sha256,
        public readonly int $size,
        public readonly string $mimeType
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->sha256);
        $buffer .= Serializer::int64($this->size);
        $buffer .= Serializer::bytes($this->mimeType);
        return $buffer;
    }
}