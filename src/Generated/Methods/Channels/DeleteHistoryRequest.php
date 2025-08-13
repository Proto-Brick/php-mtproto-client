<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.deleteHistory
 */
final class DeleteHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9baa9647;
    
    public string $predicate = 'channels.deleteHistory';
    
    public function getMethodName(): string
    {
        return 'channels.deleteHistory';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $maxId
     * @param true|null $forEveryone
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $maxId,
        public readonly ?true $forEveryone = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forEveryone) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->maxId);
        return $buffer;
    }
}