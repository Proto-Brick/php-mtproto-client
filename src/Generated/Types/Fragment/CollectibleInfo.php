<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Fragment;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/fragment.collectibleInfo
 */
final class CollectibleInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6ebdff91;
    
    public string $_ = 'fragment.collectibleInfo';
    
    /**
     * @param int $purchaseDate
     * @param string $currency
     * @param int $amount
     * @param string $cryptoCurrency
     * @param int $cryptoAmount
     * @param string $url
     */
    public function __construct(
        public readonly int $purchaseDate,
        public readonly string $currency,
        public readonly int $amount,
        public readonly string $cryptoCurrency,
        public readonly int $cryptoAmount,
        public readonly string $url
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->purchaseDate);
        $buffer .= $serializer->bytes($this->currency);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->bytes($this->cryptoCurrency);
        $buffer .= $serializer->int64($this->cryptoAmount);
        $buffer .= $serializer->bytes($this->url);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $purchaseDate = $deserializer->int32($stream);
        $currency = $deserializer->bytes($stream);
        $amount = $deserializer->int64($stream);
        $cryptoCurrency = $deserializer->bytes($stream);
        $cryptoAmount = $deserializer->int64($stream);
        $url = $deserializer->bytes($stream);
        return new self(
            $purchaseDate,
            $currency,
            $amount,
            $cryptoCurrency,
            $cryptoAmount,
            $url
        );
    }
}