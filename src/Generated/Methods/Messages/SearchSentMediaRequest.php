<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.searchSentMedia
 */
final class SearchSentMediaRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x107e31a0;
    
    public string $predicate = 'messages.searchSentMedia';
    
    public function getMethodName(): string
    {
        return 'messages.searchSentMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessages::class;
    }
    /**
     * @param string $q
     * @param AbstractMessagesFilter $filter
     * @param int $limit
     */
    public function __construct(
        public readonly string $q,
        public readonly AbstractMessagesFilter $filter,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}