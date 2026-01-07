<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.saveRecentSticker
 */
final class SaveRecentStickerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x392718f8;
    
    public string $predicate = 'messages.saveRecentSticker';
    
    public function getMethodName(): string
    {
        return 'messages.saveRecentSticker';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDocument $id
     * @param bool $unsave
     * @param true|null $attached
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly bool $unsave,
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
        $buffer .= $this->id->serialize();
        $buffer .= ($this->unsave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}