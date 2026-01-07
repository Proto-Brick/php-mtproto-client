<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\AbstractContacts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getContacts
 */
final class GetContactsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5dd69e12;
    
    public string $predicate = 'contacts.getContacts';
    
    public function getMethodName(): string
    {
        return 'contacts.getContacts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractContacts::class;
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