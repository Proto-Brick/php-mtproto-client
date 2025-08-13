<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractEmojiList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.searchCustomEmoji
 */
final class SearchCustomEmojiRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2c11c0d7;
    
    public string $predicate = 'messages.searchCustomEmoji';
    
    public function getMethodName(): string
    {
        return 'messages.searchCustomEmoji';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiList::class;
    }
    /**
     * @param string $emoticon
     * @param int $hash
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}