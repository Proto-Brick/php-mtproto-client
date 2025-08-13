<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Payments;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/payments.clearSavedInfo
 */
final class ClearSavedInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd83d70c1;
    
    public string $predicate = 'payments.clearSavedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.clearSavedInfo';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $credentials
     * @param true|null $info
     */
    public function __construct(
        public readonly ?true $credentials = null,
        public readonly ?true $info = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->credentials) {
            $flags |= (1 << 0);
        }
        if ($this->info) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}