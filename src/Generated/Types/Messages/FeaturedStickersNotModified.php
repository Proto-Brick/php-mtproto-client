<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.featuredStickersNotModified
 */
final class FeaturedStickersNotModified extends AbstractFeaturedStickers
{
    public const CONSTRUCTOR_ID = 0xc6dc0c66;
    
    public string $_ = 'messages.featuredStickersNotModified';
    
    /**
     * @param int $count
     */
    public function __construct(
        public readonly int $count
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $count = $deserializer->int32($stream);
        return new self(
            $count
        );
    }
}