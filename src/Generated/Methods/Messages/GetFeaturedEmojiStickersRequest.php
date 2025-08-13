<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFeaturedStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getFeaturedEmojiStickers
 */
final class GetFeaturedEmojiStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xecf6736;
    
    public string $predicate = 'messages.getFeaturedEmojiStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getFeaturedEmojiStickers';
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