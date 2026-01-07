<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputContact;
use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ImportedContacts;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.importContacts
 */
final class ImportContactsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2c800be5;
    
    public string $predicate = 'contacts.importContacts';
    
    public function getMethodName(): string
    {
        return 'contacts.importContacts';
    }
    
    public function getResponseClass(): string
    {
        return ImportedContacts::class;
    }
    /**
     * @param list<InputContact> $contacts
     */
    public function __construct(
        public readonly array $contacts
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->contacts);
        return $buffer;
    }
}