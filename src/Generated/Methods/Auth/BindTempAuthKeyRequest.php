<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.bindTempAuthKey
 */
final class BindTempAuthKeyRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcdd42a05;
    
    public string $predicate = 'auth.bindTempAuthKey';
    
    public function getMethodName(): string
    {
        return 'auth.bindTempAuthKey';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $permAuthKeyId
     * @param int $nonce
     * @param int $expiresAt
     * @param string $encryptedMessage
     */
    public function __construct(
        public readonly int $permAuthKeyId,
        public readonly int $nonce,
        public readonly int $expiresAt,
        public readonly string $encryptedMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->permAuthKeyId);
        $buffer .= Serializer::int64($this->nonce);
        $buffer .= Serializer::int32($this->expiresAt);
        $buffer .= Serializer::bytes($this->encryptedMessage);
        return $buffer;
    }
}