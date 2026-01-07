<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.confirmPhone
 */
final class ConfirmPhoneRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5f2178c3;
    
    public string $predicate = 'account.confirmPhone';
    
    public function getMethodName(): string
    {
        return 'account.confirmPhone';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $phoneCodeHash
     * @param string $phoneCode
     */
    public function __construct(
        public readonly string $phoneCodeHash,
        public readonly string $phoneCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->phoneCode);
        return $buffer;
    }
}