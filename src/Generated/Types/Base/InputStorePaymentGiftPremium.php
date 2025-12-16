<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputStorePaymentGiftPremium
 */
final class InputStorePaymentGiftPremium extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x616f7fe8;
    
    public string $predicate = 'inputStorePaymentGiftPremium';
    
    /**
     * @param AbstractInputUser $userId
     * @param string $currency
     * @param int $amount
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly string $currency,
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = AbstractInputUser::deserialize($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);

        return new self(
            $userId,
            $currency,
            $amount
        );
    }
}