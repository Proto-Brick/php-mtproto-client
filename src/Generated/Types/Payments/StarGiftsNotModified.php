<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.starGiftsNotModified
 */
final class StarGiftsNotModified extends AbstractStarGifts
{
    public const CONSTRUCTOR_ID = 0xa388a368;
    
    public string $predicate = 'payments.starGiftsNotModified';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID

        return new self();
    }
}