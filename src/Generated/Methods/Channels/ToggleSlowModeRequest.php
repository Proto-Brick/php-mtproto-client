<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.toggleSlowMode
 */
final class ToggleSlowModeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xedd49ef0;
    
    public string $predicate = 'channels.toggleSlowMode';
    
    public function getMethodName(): string
    {
        return 'channels.toggleSlowMode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $seconds
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $seconds
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->seconds);
        return $buffer;
    }
}