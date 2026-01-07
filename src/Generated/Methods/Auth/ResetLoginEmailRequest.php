<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.resetLoginEmail
 */
final class ResetLoginEmailRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7e960193;
    
    public string $predicate = 'auth.resetLoginEmail';
    
    public function getMethodName(): string
    {
        return 'auth.resetLoginEmail';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        return $buffer;
    }
}