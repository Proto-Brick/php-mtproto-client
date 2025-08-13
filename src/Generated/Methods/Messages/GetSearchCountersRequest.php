<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractMessagesFilter;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\SearchCounter;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSearchCounters
 */
final class GetSearchCountersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1bbcf300;
    
    public string $predicate = 'messages.getSearchCounters';
    
    public function getMethodName(): string
    {
        return 'messages.getSearchCounters';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . SearchCounter::class . '>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<AbstractMessagesFilter> $filters
     * @param AbstractInputPeer|null $savedPeerId
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $filters,
        public readonly ?AbstractInputPeer $savedPeerId = null,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->savedPeerId !== null) {
            $flags |= (1 << 2);
        }
        if ($this->topMsgId !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= $this->savedPeerId->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= Serializer::vectorOfObjects($this->filters);
        return $buffer;
    }
}