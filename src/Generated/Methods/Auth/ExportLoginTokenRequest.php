<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractLoginToken;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.exportLoginToken
 */
final class ExportLoginTokenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb7e085fe;
    
    public string $predicate = 'auth.exportLoginToken';
    
    public function getMethodName(): string
    {
        return 'auth.exportLoginToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractLoginToken::class;
    }
    /**
     * @param int $apiId
     * @param string $apiHash
     * @param list<int> $exceptIds
     */
    public function __construct(
        public readonly int $apiId,
        public readonly string $apiHash,
        public readonly array $exceptIds
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->apiId);
        $buffer .= Serializer::bytes($this->apiHash);
        $buffer .= Serializer::vectorOfLongs($this->exceptIds);
        return $buffer;
    }
}