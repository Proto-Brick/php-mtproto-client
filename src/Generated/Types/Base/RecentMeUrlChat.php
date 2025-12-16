<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/recentMeUrlChat
 */
final class RecentMeUrlChat extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0xb2da71d2;
    
    public string $predicate = 'recentMeUrlChat';
    
    /**
     * @param string $url
     * @param int $chatId
     */
    public function __construct(
        public readonly string $url,
        public readonly int $chatId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->chatId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $chatId = Deserializer::int64($stream);

        return new self(
            $url,
            $chatId
        );
    }
}