<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractFavedStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getFavedStickers
 */
final class GetFavedStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4f1aaa9;
    
    public string $predicate = 'messages.getFavedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getFavedStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFavedStickers::class;
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