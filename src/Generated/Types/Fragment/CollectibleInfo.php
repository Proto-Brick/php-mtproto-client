<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Fragment;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/fragment.collectibleInfo
 */
final class CollectibleInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6ebdff91;
    
    public string $predicate = 'fragment.collectibleInfo';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->purchaseDate);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::bytes($this->cryptoCurrency);
        $buffer .= Serializer::int64($this->cryptoAmount);
        $buffer .= Serializer::bytes($this->url);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $purchaseDate = Deserializer::int32($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);
        $cryptoCurrency = Deserializer::bytes($stream);
        $cryptoAmount = Deserializer::int64($stream);
        $url = Deserializer::bytes($stream);

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