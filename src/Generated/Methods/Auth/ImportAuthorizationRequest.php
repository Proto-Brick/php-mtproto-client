<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Auth;

use ProtoBrick\MTProtoClient\Generated\Types\Auth\AbstractAuthorization;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/auth.importAuthorization
 */
final class ImportAuthorizationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa57a7dad;
    
    public string $predicate = 'auth.importAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.importAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorization::class;
    }
    /**
     * @param int $id
     * @param string $bytes
     */
    public function __construct(
        public readonly int $id,
        public readonly string $bytes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::bytes($this->bytes);
        return $buffer;
    }
}