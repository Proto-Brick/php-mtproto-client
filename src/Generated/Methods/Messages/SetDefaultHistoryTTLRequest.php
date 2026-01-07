<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setDefaultHistoryTTL
 */
final class SetDefaultHistoryTTLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9eb51445;
    
    public string $predicate = 'messages.setDefaultHistoryTTL';
    
    public function getMethodName(): string
    {
        return 'messages.setDefaultHistoryTTL';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $period
     */
    public function __construct(
        public readonly int $period
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->period);
        return $buffer;
    }
}