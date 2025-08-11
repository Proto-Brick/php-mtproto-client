<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.foundStickerSets
 */
final class FoundStickerSets extends AbstractFoundStickerSets
{
    public const CONSTRUCTOR_ID = 0x8af09dd2;
    
    public string $_ = 'messages.foundStickerSets';
    
    /**
     * @param int $hash
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $sets
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->sets);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $hash = Deserializer::int64($stream);
        $sets = Deserializer::vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);
        return new self(
            $hash,
            $sets
        );
    }
}