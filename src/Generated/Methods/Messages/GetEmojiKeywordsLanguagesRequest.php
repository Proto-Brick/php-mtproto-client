<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiLanguage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywordsLanguages
 */
final class GetEmojiKeywordsLanguagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4e9963b2;
    
    public string $predicate = 'messages.getEmojiKeywordsLanguages';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywordsLanguages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . EmojiLanguage::class . '>';
    }
    /**
     * @param list<string> $langCodes
     */
    public function __construct(
        public readonly array $langCodes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfStrings($this->langCodes);
        return $buffer;
    }
}