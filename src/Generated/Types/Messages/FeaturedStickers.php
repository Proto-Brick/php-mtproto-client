<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.featuredStickers
 */
final class FeaturedStickers extends AbstractFeaturedStickers
{
    public const CONSTRUCTOR_ID = 0xbe382906;
    
    public string $_ = 'messages.featuredStickers';
    
    /**
     * @param int $hash
     * @param int $count
     * @param list<AbstractStickerSetCovered> $sets
     * @param list<int> $unread
     * @param bool|null $premium
     */
    public function __construct(
        public readonly int $hash,
        public readonly int $count,
        public readonly array $sets,
        public readonly array $unread,
        public readonly ?bool $premium = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premium) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        $buffer .= Serializer::vectorOfLongs($this->unread);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $premium = ($flags & (1 << 0)) ? true : null;
        $hash = Deserializer::int64($stream);
        $count = Deserializer::int32($stream);
        $sets = Deserializer::vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);
        $unread = Deserializer::vectorOfLongs($stream);
        return new self(
            $hash,
            $count,
            $sets,
            $unread,
            $premium
        );
    }
}