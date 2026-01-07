<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractRecentStickers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getRecentStickers
 */
final class GetRecentStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9da9403b;
    
    public string $predicate = 'messages.getRecentStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getRecentStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractRecentStickers::class;
    }
    /**
     * @param int $hash
     * @param true|null $attached
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?true $attached = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->attached) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}