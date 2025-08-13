<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAvailableReactions;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAvailableReactions
 */
final class GetAvailableReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x18dea0ac;
    
    public string $predicate = 'messages.getAvailableReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getAvailableReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAvailableReactions::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}