<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\MyStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMyStickers
 */
final class GetMyStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd0b5e1fc;
    
    public string $predicate = 'messages.getMyStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getMyStickers';
    }
    
    public function getResponseClass(): string
    {
        return MyStickers::class;
    }
    /**
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}