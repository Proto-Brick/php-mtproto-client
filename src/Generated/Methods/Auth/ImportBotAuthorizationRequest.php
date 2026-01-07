<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.importBotAuthorization
 */
final class ImportBotAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x67a3ff2c;
    
    public string $predicate = 'auth.importBotAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importBotAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param int $flags
     * @param int $apiId
     * @param string $apiHash
     * @param string $botAuthToken
     */
    public function __construct(
        public readonly int $flags,
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly string $botAuthToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->flags);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        $buffer .= Serializer::bytes($this->botAuthToken);
        return $buffer;
    }
}