<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/recentMeUrlUser
 */
final class RecentMeUrlUser extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0xb92c09e2;
    
    public string $predicate = 'recentMeUrlUser';
    
    /**
     * @param string $url
     * @param int $userId
     */
    public function __construct(
        public readonly string $url,
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);
        $userId = Deserializer::int64($stream);

        return new self(
            $url,
            $userId
        );
    }
}