<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAllStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getMaskStickers
 */
final class GetMaskStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x640f82b8;
    
    public string $predicate = 'messages.getMaskStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getMaskStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAllStickers::class;
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