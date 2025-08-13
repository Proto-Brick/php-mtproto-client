<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStorePaymentAuthCode
 */
final class InputStorePaymentAuthCode extends AbstractInputStorePaymentPurpose
{
    public const CONSTRUCTOR_ID = 0x9bb2636d;
    
    public string $predicate = 'inputStorePaymentAuthCode';
    
    /**
     * @param string $phoneNumber
     * @param string $phoneCodeHash
     * @param string $currency
     * @param int $amount
     * @param true|null $restore
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly string $phoneCodeHash,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?true $restore = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->restore) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= Serializer::bytes($this->phoneCodeHash);
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $restore = ($flags & (1 << 0)) ? true : null;
        $phoneNumber = Deserializer::bytes($stream);
        $phoneCodeHash = Deserializer::bytes($stream);
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);

        return new self(
            $phoneNumber,
            $phoneCodeHash,
            $currency,
            $amount,
            $restore
        );
    }
}