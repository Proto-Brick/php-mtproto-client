<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/recentMeUrlUser
 */
final class RecentMeUrlUser extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0xb92c09e2;
    
    public string $_ = 'recentMeUrlUser';
    
    /**
     * @param string $url
     * @param int $userId
     */
    public function __construct(
        public readonly string $url,
        public readonly int $userId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->url);
        $buffer .= $serializer->int64($this->userId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $url = $deserializer->bytes($stream);
        $userId = $deserializer->int64($stream);
        return new self(
            $url,
            $userId
        );
    }
}