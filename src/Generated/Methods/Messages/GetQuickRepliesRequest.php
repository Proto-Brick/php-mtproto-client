<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractQuickReplies;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getQuickReplies
 */
final class GetQuickRepliesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd483f2a8;
    
    public string $predicate = 'messages.getQuickReplies';
    
    public function getMethodName(): string
    {
        return 'messages.getQuickReplies';
    }
    
    public function getResponseClass(): string
    {
        return AbstractQuickReplies::class;
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
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}