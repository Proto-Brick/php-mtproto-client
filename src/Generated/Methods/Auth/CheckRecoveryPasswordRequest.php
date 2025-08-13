<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.checkRecoveryPassword
 */
final class CheckRecoveryPasswordRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd36bf79;
    
    public string $predicate = 'auth.checkRecoveryPassword';
    
    public function getMethodName(): string
    {
        return 'auth.checkRecoveryPassword';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $code
     */
    public function __construct(
        public readonly string $code
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->code);
        return $buffer;
    }
}