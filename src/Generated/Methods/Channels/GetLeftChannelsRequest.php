<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getLeftChannels
 */
final class GetLeftChannelsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8341ecc0;
    
    public string $predicate = 'channels.getLeftChannels';
    
    public function getMethodName(): string
    {
        return 'channels.getLeftChannels';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    /**
     * @param int $offset
     */
    public function __construct(
        public readonly int $offset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->offset);
        return $buffer;
    }
}