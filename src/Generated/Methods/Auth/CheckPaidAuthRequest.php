<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractSentCode;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.checkPaidAuth
 */
final class CheckPaidAuthRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x56e59f9c;
    
    public string $predicate = 'auth.checkPaidAuth';
    
    public function getMethodName(): string
    {
        return 'auth.checkPaidAuth';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSentCode::class;
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param int $formId
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly int $formId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::int64($this->formId);
        return $buffer;
    }
}