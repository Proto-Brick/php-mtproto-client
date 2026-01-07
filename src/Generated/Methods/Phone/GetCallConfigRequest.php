<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getCallConfig
 */
final class GetCallConfigRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x55451fa9;
    
    public string $predicate = 'phone.getCallConfig';
    
    public function getMethodName(): string
    {
        return 'phone.getCallConfig';
    }
    
    public function getResponseClass(): string
    {
        return 'array';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}