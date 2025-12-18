<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $url = Deserializer::bytes($__payload, $__offset);

        return new self(
            $url
        );
    }
}