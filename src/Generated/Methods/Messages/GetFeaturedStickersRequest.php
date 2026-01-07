<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFeaturedStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getFeaturedStickers
 */
final class GetFeaturedStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x64780b14;
    
    public string $predicate = 'messages.getFeaturedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getFeaturedStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFeaturedStickers::class;
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