<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Contacts\ContactBirthdays;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getBirthdays
 */
final class GetBirthdaysRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdaeda864;
    
    public string $predicate = 'contacts.getBirthdays';
    
    public function getMethodName(): string
    {
        return 'contacts.getBirthdays';
    }
    
    public function getResponseClass(): string
    {
        return ContactBirthdays::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}