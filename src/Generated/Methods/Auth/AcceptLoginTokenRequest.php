<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Authorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.acceptLoginToken
 */
final class AcceptLoginTokenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe894ad4d;
    
    public string $predicate = 'auth.acceptLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.acceptLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return Authorization::class;
    }
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
}