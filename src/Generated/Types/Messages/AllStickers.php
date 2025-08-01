<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSet;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.allStickers
 */
final class AllStickers extends AbstractAllStickers
{
    public const CONSTRUCTOR_ID = 3451637435;
    
    public string $_ = 'messages.allStickers';
    
    /**
     * @param int $hash
     * @param list<AbstractStickerSet> $sets
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $sets
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->sets);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int64($stream);
        $sets = $deserializer->vectorOfObjects($stream, [AbstractStickerSet::class, 'deserialize']);
            return new self(
            $hash,
            $sets
        );
    }
}