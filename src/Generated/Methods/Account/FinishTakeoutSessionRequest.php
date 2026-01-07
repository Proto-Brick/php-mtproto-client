<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.finishTakeoutSession
 */
final class FinishTakeoutSessionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1d2652ee;
    
    public string $predicate = 'account.finishTakeoutSession';
    
    public function getMethodName(): string
    {
        return 'account.finishTakeoutSession';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $success
     */
    public function __construct(
        public readonly ?true $success = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->success) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}