<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValue;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAllSecureValues
 */
final class GetAllSecureValuesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb288bc7d;
    
    public string $predicate = 'account.getAllSecureValues';
    
    public function getMethodName(): string
    {
        return 'account.getAllSecureValues';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SecureValue::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}