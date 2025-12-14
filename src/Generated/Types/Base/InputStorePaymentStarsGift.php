<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentStarsGift
 */
final class InputStorePaymentStarsGift extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x1d741ef7;
    
    public string $predicate = 'inputStorePaymentStarsGift';
    
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
        Deserializer::int32($stream); // Constructor ID
        $userId = AbstractInputUser::deserialize($stream);
        $stars = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $currency = Deserializer::bytes($stream);
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $userId,
            $stars,
            $currency,
            $amount
        );
    }
}