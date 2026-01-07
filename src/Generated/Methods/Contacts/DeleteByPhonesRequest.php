<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.deleteByPhones
 */
final class DeleteByPhonesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1013fd9e;
    
    public string $predicate = 'contacts.deleteByPhones';
    
    public function getMethodName(): string
    {
        return 'contacts.deleteByPhones';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<string> $phones
     */
    public function __construct(
        public readonly array $phones
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->phones);
        return $buffer;
    }
}