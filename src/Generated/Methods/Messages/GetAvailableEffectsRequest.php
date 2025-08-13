<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractAvailableEffects;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAvailableEffects
 */
final class GetAvailableEffectsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdea20a39;
    
    public string $predicate = 'messages.getAvailableEffects';
    
    public function getMethodName(): string
    {
        return 'messages.getAvailableEffects';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAvailableEffects::class;
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
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}