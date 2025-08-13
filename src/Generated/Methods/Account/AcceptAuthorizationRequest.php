<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureCredentialsEncrypted;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueHash;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.acceptAuthorization
 */
final class AcceptAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf3ed4c73;
    
    public string $predicate = 'account.acceptAuthorization';
    
    public function getMethodName(): string
    {
        return 'account.acceptAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     * @param list<SecureValueHash> $valueHashes
     * @param SecureCredentialsEncrypted $credentials
     */
    public function __construct(
        public readonly int $botId,
        public readonly string $scope,
        public readonly string $publicKey,
        public readonly array $valueHashes,
        public readonly SecureCredentialsEncrypted $credentials
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->scope);
        $buffer .= Serializer::bytes($this->publicKey);
        $buffer .= Serializer::vectorOfObjects($this->valueHashes);
        $buffer .= $this->credentials->serialize();
        return $buffer;
    }
}