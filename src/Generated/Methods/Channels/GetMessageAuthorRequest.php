<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.getMessageAuthor
 */
final class GetMessageAuthorRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xece2a0e6;
    
    public string $predicate = 'channels.getMessageAuthor';
    
    public function getMethodName(): string
    {
        return 'channels.getMessageAuthor';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}