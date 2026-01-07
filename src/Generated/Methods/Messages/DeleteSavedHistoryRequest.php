<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AffectedHistory;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.deleteSavedHistory
 */
final class DeleteSavedHistoryRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4dc5085f;
    
    public string $predicate = 'messages.deleteSavedHistory';
    
    public function getMethodName(): string
    {
        return 'messages.deleteSavedHistory';
    }
    
    public function getResponseClass(): string
    {
        return AffectedHistory::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $maxId
     * @param AbstractInputPeer|null $parentPeer
     * @param int|null $minDate
     * @param int|null $maxDate
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $maxId,
        public readonly ?AbstractInputPeer $parentPeer = null,
        public readonly ?int $minDate = null,
        public readonly ?int $maxDate = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->parentPeer !== null) {
            $flags |= (1 << 0);
        }
        if ($this->minDate !== null) {
            $flags |= (1 << 2);
        }
        if ($this->maxDate !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->parentPeer->serialize();
        }
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->maxId);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->minDate);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int32($this->maxDate);
        }
        return $buffer;
    }
}