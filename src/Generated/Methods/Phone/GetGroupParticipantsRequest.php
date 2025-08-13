<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputGroupCall;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Phone\GroupParticipants;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.getGroupParticipants
 */
final class GetGroupParticipantsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc558d8ab;
    
    public string $predicate = 'phone.getGroupParticipants';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupParticipants';
    }
    
    public function getResponseClass(): string
    {
        return GroupParticipants::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param list<AbstractInputPeer> $ids
     * @param list<int> $sources
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly array $ids,
        public readonly array $sources,
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::vectorOfObjects($this->ids);
        $buffer .= Serializer::vectorOfInts($this->sources);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}