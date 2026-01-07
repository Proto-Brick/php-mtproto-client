<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Base;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/invokeWithReCaptcha
 */
final class InvokeWithReCaptchaRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xadbb0f94;
    
    public string $predicate = 'invokeWithReCaptcha';
    
    public function getMethodName(): string
    {
        return 'invokeWithReCaptcha';
    }
    
    public function getResponseClass(): string
    {
        return TlObject::class;
    }
    /**
     * @param string $token
     * @param TlObject $query
     */
    public function __construct(
        public readonly string $token,
        public readonly TlObject $query
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        $buffer .= $this->query->serialize();
        return $buffer;
    }
}