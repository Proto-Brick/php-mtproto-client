<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractLoginToken;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.importLoginToken
 */
final class ImportLoginTokenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x95ac5ce4;
    
    public string $predicate = 'auth.importLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.importLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLoginToken::class;
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