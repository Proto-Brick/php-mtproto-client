<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getCustomEmojiDocuments
 */
final class GetCustomEmojiDocumentsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd9ab0f54;
    
    public string $predicate = 'messages.getCustomEmojiDocuments';
    
    public function getMethodName(): string
    {
        return 'messages.getCustomEmojiDocuments';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractDocument::class . '>';
    }
    /**
     * @param list<int> $documentId
     */
    public function __construct(
        public readonly array $documentId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->documentId);
        return $buffer;
    }
}