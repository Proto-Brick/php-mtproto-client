<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.unregisterDevice
 */
final class UnregisterDeviceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6a0d3206;
    
    public string $predicate = 'account.unregisterDevice';
    
    public function getMethodName(): string
    {
        return 'account.unregisterDevice';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $tokenType
     * @param string $token
     * @param list<int> $otherUids
     */
    public function __construct(
        public readonly int $tokenType,
        public readonly string $token,
        public readonly array $otherUids
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->tokenType);
        $buffer .= Serializer::bytes($this->token);
        $buffer .= Serializer::vectorOfLongs($this->otherUids);
        return $buffer;
    }
}