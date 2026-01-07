<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.faveSticker
 */
final class FaveStickerRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb9ffc55b;
    
    public string $predicate = 'messages.faveSticker';
    
    public function getMethodName(): string
    {
        return 'messages.faveSticker';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDocument $id
     * @param bool $unfave
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly bool $unfave
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= ($this->unfave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}