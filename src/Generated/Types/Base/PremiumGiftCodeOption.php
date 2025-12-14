<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/premiumGiftCodeOption
 */
final class PremiumGiftCodeOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x257e962b;
    
    public string $predicate = 'premiumGiftCodeOption';
    
    /**
     * @param int $users
     * @param int $months
     * @param string $currency
     * @param int $amount
     * @param string|null $storeProduct
     * @param int|null $storeQuantity
     */
    public function __construct(
        public readonly int $users,
        public readonly int $months,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?string $storeProduct = null,
        public readonly ?int $storeQuantity = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->storeProduct !== null) {
            $flags |= (1 << 0);
        }
        if ($this->storeQuantity !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->users);
        $buffer .= Serializer::int32($this->months);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->storeProduct);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->storeQuantity);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $users = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $months = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $storeProduct = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $storeQuantity = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $users,
            $months,
            $currency,
            $amount,
            $storeProduct,
            $storeQuantity
        );
    }
}