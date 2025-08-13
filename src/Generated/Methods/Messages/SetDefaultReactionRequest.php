<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractReaction;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setDefaultReaction
 */
final class SetDefaultReactionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4f47a016;
    
    public string $predicate = 'messages.setDefaultReaction';
    
    public function getMethodName(): string
    {
        return 'messages.setDefaultReaction';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractReaction $reaction
     */
    public function __construct(
        public readonly AbstractReaction $reaction
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->reaction->serialize();
        return $buffer;
    }
}