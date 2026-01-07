<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\PasskeyRegistrationOptions;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.initPasskeyRegistration
 */
final class InitPasskeyRegistrationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x429547e8;
    
    public string $predicate = 'account.initPasskeyRegistration';
    
    public function getMethodName(): string
    {
        return 'account.initPasskeyRegistration';
    }
    
    public function getResponseClass(): string
    {
        return PasskeyRegistrationOptions::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}