<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\VotesList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPollVotes
 */
final class GetPollVotesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb86e380e;
    
    public string $predicate = 'messages.getPollVotes';
    
    public function getMethodName(): string
    {
        return 'messages.getPollVotes';
    }
    
    public function getResponseClass(): string
    {
        return VotesList::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param int $limit
     * @param string|null $option
     * @param string|null $offset
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly int $limit,
        public readonly ?string $option = null,
        public readonly ?string $offset = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->option !== null) {
            $flags |= (1 << 0);
        }
        if ($this->offset !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->option);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->offset);
        }
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}