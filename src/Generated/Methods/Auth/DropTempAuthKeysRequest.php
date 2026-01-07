<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.dropTempAuthKeys
 */
final class DropTempAuthKeysRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8e48a188;
    
    public string $predicate = 'auth.dropTempAuthKeys';
    
    public function getMethodName(): string
    {
        return 'auth.dropTempAuthKeys';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $exceptAuthKeys
     */
    public function __construct(
        public readonly array $exceptAuthKeys
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->exceptAuthKeys);
        return $buffer;
    }
}