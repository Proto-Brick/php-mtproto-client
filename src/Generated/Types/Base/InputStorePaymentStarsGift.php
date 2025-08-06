<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStorePaymentStarsGift
 */
final class InputStorePaymentStarsGift extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x1d741ef7;
    
    public string $_ = 'inputStorePaymentStarsGift';
    
    /**
     * @param AbstractInputUser $userId
     * @param int $stars
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int64($this->stars);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $userId = AbstractInputUser::deserialize($deserializer, $stream);
        $stars = $deserializer->int64($stream);
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        return new self(
            $userId,
            $stars,
            $currency,
            $amount
        );
    }
}