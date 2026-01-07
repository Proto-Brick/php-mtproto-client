<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\EmojiKeywordsDifference;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getEmojiKeywordsDifference
 */
final class GetEmojiKeywordsDifferenceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1508b6af;
    
    public string $predicate = 'messages.getEmojiKeywordsDifference';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiKeywordsDifference';
    }
    
    public function getResponseClass(): string
    {
        return EmojiKeywordsDifference::class;
    }
    /**
     * @param string $langCode
     * @param int $fromVersion
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $fromVersion
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->fromVersion);
        return $buffer;
    }
}