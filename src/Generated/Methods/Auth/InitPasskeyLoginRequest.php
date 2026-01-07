<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\PasskeyLoginOptions;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.initPasskeyLogin
 */
final class InitPasskeyLoginRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x518ad0b7;
    
    public string $predicate = 'auth.initPasskeyLogin';
    
    public function getMethodName(): string
    {
        return 'auth.initPasskeyLogin';
    }
    
    public function getResponseClass(): string
    {
        return PasskeyLoginOptions::class;
    }
    /**
     * @param int $apiId
     * @param string $apiHash
     */
    public function __construct(
        public readonly int $apiId,
        public readonly string $apiHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        return $buffer;
    }
}