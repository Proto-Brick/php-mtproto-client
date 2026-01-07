<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.clearRecentStickers
 */
final class ClearRecentStickersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8999602d;
    
    public string $predicate = 'messages.clearRecentStickers';
    
    public function getMethodName(): string
    {
        return 'messages.clearRecentStickers';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param true|null $attached
     */
    public function __construct(
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
        return $buffer;
    }
}