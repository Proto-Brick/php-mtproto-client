<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiURL;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiURL
 */
final class GetEmojiURLRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd5b10c26;
    
    public string $predicate = 'messages.getEmojiURL';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiURL';
    }
    
    public function getResponseClass(): string
    {
        return EmojiURL::class;
    }
    /**
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }
}