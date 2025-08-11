<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStorePaymentStarsTopup
 */
final class InputStorePaymentStarsTopup extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0xdddd0f56;
    
    public string $_ = 'inputStorePaymentStarsTopup';
    
    /**
     * @param int $stars
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $stars = Deserializer::int64($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        return new self(
            $stars,
            $currency,
            $amount
        );
    }
}