<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.readFeaturedStickers
 */
final class ReadFeaturedStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5b118126;
    
    public string $predicate = 'messages.readFeaturedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.readFeaturedStickers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<int> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->id);
        return $buffer;
    }
}