<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractReactions;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDefaultTagReactions
 */
final class GetDefaultTagReactionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xbdf93428;
    
    public string $predicate = 'messages.getDefaultTagReactions';
    
    public function getMethodName(): string
    {
        return 'messages.getDefaultTagReactions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractReactions::class;
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