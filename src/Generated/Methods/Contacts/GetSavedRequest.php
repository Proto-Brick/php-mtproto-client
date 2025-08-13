<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SavedContact;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getSaved
 */
final class GetSavedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x82f1e39f;
    
    public string $predicate = 'contacts.getSaved';
    
    public function getMethodName(): string
    {
        return 'contacts.getSaved';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SavedContact::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}