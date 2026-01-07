<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.deletePasskey
 */
final class DeletePasskeyRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf5b5563f;
    
    public string $predicate = 'account.deletePasskey';
    
    public function getMethodName(): string
    {
        return 'account.deletePasskey';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $id
     */
    public function __construct(
        public readonly string $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->id);
        return $buffer;
    }
}