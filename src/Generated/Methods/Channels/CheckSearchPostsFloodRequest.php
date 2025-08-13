<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Base\SearchPostsFlood;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.checkSearchPostsFlood
 */
final class CheckSearchPostsFloodRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x22567115;
    
    public string $predicate = 'channels.checkSearchPostsFlood';
    
    public function getMethodName(): string
    {
        return 'channels.checkSearchPostsFlood';
    }
    
    public function getResponseClass(): string
    {
        return SearchPostsFlood::class;
    }
    /**
     * @param string|null $query
     */
    public function __construct(
        public readonly ?string $query = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->query !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->query);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}