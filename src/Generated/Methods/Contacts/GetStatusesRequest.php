<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ContactStatus;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.getStatuses
 */
final class GetStatusesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc4a353ee;
    
    public string $predicate = 'contacts.getStatuses';
    
    public function getMethodName(): string
    {
        return 'contacts.getStatuses';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . ContactStatus::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}