<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.reportMissingCode
 */
final class ReportMissingCodeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcb9deff6;
    
    public string $predicate = 'auth.reportMissingCode';
    
    public function getMethodName(): string
    {
        return 'auth.reportMissingCode';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $mnc
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $mnc
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->mnc);
        return $buffer;
    }
}