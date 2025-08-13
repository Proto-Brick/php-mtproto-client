<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.setBotUpdatesStatus
 */
final class SetBotUpdatesStatusRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xec22cfcd;
    
    public string $predicate = 'help.setBotUpdatesStatus';
    
    public function getMethodName(): string
    {
        return 'help.setBotUpdatesStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $pendingUpdatesCount
     * @param string $message
     */
    public function __construct(
        public readonly int $pendingUpdatesCount,
        public readonly string $message
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pendingUpdatesCount);
        $buffer .= Serializer::bytes($this->message);
        return $buffer;
    }
}