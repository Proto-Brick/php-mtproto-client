<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedMessageLink;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.exportMessageLink
 */
final class ExportMessageLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe63fadeb;
    
    public string $predicate = 'channels.exportMessageLink';
    
    public function getMethodName(): string
    {
        return 'channels.exportMessageLink';
    }
    
    public function getResponseClass(): string
    {
        return ExportedMessageLink::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param int $id
     * @param true|null $grouped
     * @param true|null $thread
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly int $id,
        public readonly ?true $grouped = null,
        public readonly ?true $thread = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->grouped) {
            $flags |= (1 << 0);
        }
        if ($this->thread) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}