<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\ArchivedStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getArchivedStickers
 */
final class GetArchivedStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x57f17692;
    
    public string $predicate = 'messages.getArchivedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getArchivedStickers';
    }
    
    public function getResponseClass(): string
    {
        return ArchivedStickers::class;
    }
    /**
     * @param int $offsetId
     * @param int $limit
     * @param true|null $masks
     * @param true|null $emojis
     */
    public function __construct(
        public readonly int $offsetId,
        public readonly int $limit,
        public readonly ?true $masks = null,
        public readonly ?true $emojis = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->masks) {
            $flags |= (1 << 0);
        }
        if ($this->emojis) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}