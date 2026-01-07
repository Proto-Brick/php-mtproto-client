<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getStickers
 */
final class GetStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd5a5d3a1;
    
    public string $predicate = 'messages.getStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickers::class;
    }
    /**
     * @param string $emoticon
     * @param int $hash
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}