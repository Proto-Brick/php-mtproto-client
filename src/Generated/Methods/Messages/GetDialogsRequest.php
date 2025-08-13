<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractDialogs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDialogs
 */
final class GetDialogsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa0f4cb4f;
    
    public string $predicate = 'messages.getDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDialogs::class;
    }
    /**
     * @param int $offsetDate
     * @param int $offsetId
     * @param AbstractInputPeer $offsetPeer
     * @param int $limit
     * @param int $hash
     * @param true|null $excludePinned
     * @param int|null $folderId
     */
    public function __construct(
        public readonly int $offsetDate,
        public readonly int $offsetId,
        public readonly AbstractInputPeer $offsetPeer,
        public readonly int $limit,
        public readonly int $hash,
        public readonly ?true $excludePinned = null,
        public readonly ?int $folderId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->excludePinned) {
            $flags |= (1 << 0);
        }
        if ($this->folderId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        $buffer .= Serializer::int32($this->offsetDate);
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= $this->offsetPeer->serialize();
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}