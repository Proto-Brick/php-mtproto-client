<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/recentMeUrlUnknown
 */
final class RecentMeUrlUnknown extends AbstractRecentMeUrl
{
    public const CONSTRUCTOR_ID = 0x46e1d13d;
    
    public string $predicate = 'recentMeUrlUnknown';
    
    /**
     * @param string $url
     */
    public function __construct(
        public readonly string $url
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->url);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $url = Deserializer::bytes($stream);

        return new self(
            $url
        );
    }
}