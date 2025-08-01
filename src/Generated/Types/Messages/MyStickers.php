<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.myStickers
 */
final class MyStickers extends AbstractMyStickers
{
    public const CONSTRUCTOR_ID = 4211040925;
    
    public string $_ = 'messages.myStickers';
    
    /**
     * @param int $count
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly int $count,
        public readonly array $sets
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->count);
        $buffer .= $serializer->vectorOfObjects($this->sets);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $count = $deserializer->int32($stream);
        $sets = $deserializer->vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);
            return new self(
            $count,
            $sets
        );
    }
}