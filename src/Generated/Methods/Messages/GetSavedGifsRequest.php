<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedGifs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSavedGifs
 */
final class GetSavedGifsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x5cf09635;
    
    public string $predicate = 'messages.getSavedGifs';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedGifs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedGifs::class;
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