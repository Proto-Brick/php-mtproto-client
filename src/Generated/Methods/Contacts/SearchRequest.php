<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\Found;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.search
 */
final class SearchRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x11f812d8;
    
    public string $predicate = 'contacts.search';
    
    public function getMethodName(): string
    {
        return 'contacts.search';
    }
    
    public function getResponseClass(): string
    {
        return Found::class;
    }
    /**
     * @param string $q
     * @param int $limit
     */
    public function __construct(
        public readonly string $q,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->q);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}