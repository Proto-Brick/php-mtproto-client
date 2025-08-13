<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiKeywordsDifference;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywords
 */
final class GetEmojiKeywordsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x35a0e062;
    
    public string $predicate = 'messages.getEmojiKeywords';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywords';
    }
    
    public function getResponseClass(): string
    {
        return EmojiKeywordsDifference::class;
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