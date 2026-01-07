<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedMessages;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.deleteMessages
 */
final class DeleteMessagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x84c1fd4e;
    
    public string $predicate = 'channels.deleteMessages';
    
    public function getMethodName(): string
    {
        return 'channels.deleteMessages';
    }
    
    public function getResponseClass(): string
    {
        return AffectedMessages::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        return $buffer;
    }
}