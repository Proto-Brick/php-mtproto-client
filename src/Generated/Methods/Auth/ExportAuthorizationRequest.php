<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\ExportedAuthorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.exportAuthorization
 */
final class ExportAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe5bfffcd;
    
    public string $predicate = 'auth.exportAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.exportAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return ExportedAuthorization::class;
    }
    /**
     * @param int $dcId
     */
    public function __construct(
        public readonly int $dcId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        return $buffer;
    }
}