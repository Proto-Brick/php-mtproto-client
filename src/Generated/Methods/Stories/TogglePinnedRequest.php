<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.togglePinned
 */
final class TogglePinnedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9a75a1ef;
    
    public string $predicate = 'stories.togglePinned';
    
    public function getMethodName(): string
    {
        return 'stories.togglePinned';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param bool $pinned
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly bool $pinned
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::vectorOfInts($this->id);
        $buffer .= ($this->pinned ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}