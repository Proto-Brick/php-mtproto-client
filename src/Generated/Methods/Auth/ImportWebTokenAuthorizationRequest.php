<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.importWebTokenAuthorization
 */
final class ImportWebTokenAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2db873a9;
    
    public string $predicate = 'auth.importWebTokenAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importWebTokenAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param int $apiId
     * @param string $apiHash
     * @param string $webAuthToken
     */
    public function __construct(
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly string $webAuthToken
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        $buffer .= Serializer::bytes($this->webAuthToken);
        return $buffer;
    }
}