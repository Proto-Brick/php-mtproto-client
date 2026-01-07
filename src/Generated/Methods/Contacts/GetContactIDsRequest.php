<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getContactIDs
 */
final class GetContactIDsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7adc669d;
    
    public string $predicate = 'contacts.getContactIDs';
    
    public function getMethodName(): string
    {
        return 'contacts.getContactIDs';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}