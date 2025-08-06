<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\StarGift;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starGifts
 */
final class StarGifts extends AbstractStarGifts
{
    public const CONSTRUCTOR_ID = 0x901689ea;
    
    public string $_ = 'payments.starGifts';
    
    /**
     * @param int $hash
     * @param list<StarGift> $gifts
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $gifts
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->hash);
        $buffer .= $serializer->vectorOfObjects($this->gifts);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $hash = $deserializer->int32($stream);
        $gifts = $deserializer->vectorOfObjects($stream, [StarGift::class, 'deserialize']);
        return new self(
            $hash,
            $gifts
        );
    }
}