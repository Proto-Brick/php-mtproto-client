<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AuthorizationForm;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAuthorizationForm
 */
final class GetAuthorizationFormRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa929597a;
    
    public string $predicate = 'account.getAuthorizationForm';
    
    public function getMethodName(): string
    {
        return 'account.getAuthorizationForm';
    }
    
    public function getResponseClass(): string
    {
        return AuthorizationForm::class;
    }
    /**
     * @param int $botId
     * @param string $scope
     * @param string $publicKey
     */
    public function __construct(
        public readonly int $botId,
        public readonly string $scope,
        public readonly string $publicKey
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::bytes($this->scope);
        $buffer .= Serializer::bytes($this->publicKey);
        return $buffer;
    }
}