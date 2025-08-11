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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int64($this->stars);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $userId = AbstractInputUser::deserialize($stream);
        $stars = Deserializer::int64($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        return new self(
            $userId,
            $stars,
            $currency,
            $amount
        );
    }
}