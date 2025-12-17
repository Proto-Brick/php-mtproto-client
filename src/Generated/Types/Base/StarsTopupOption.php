<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsTopupOption
 */
final class StarsTopupOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbd915c0;
    
    public string $predicate = 'starsTopupOption';
    
    /**
     * @param int $stars
     * @param string $currency
     * @param int $amount
     * @param true|null $extended
     * @param string|null $storeProduct
     */
    public function __construct(
        public readonly int $stars,
        public readonly string $currency,
        public readonly int $amount,
        public readonly ?true $extended = null,
        public readonly ?string $storeProduct = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->extended) {
            $flags |= (1 << 1);
        }
        if ($this->storeProduct !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->stars);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->storeProduct);
        }
        $buffer .= Serializer::bytes($this->currency);
        $buffer .= Serializer::int64($this->amount);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $extended = (($flags & (1 << 1)) !== 0) ? true : null;
        $stars = Deserializer::int64($__payload, $__offset);
        $storeProduct = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $currency = Deserializer::bytes($__payload, $__offset);
        $amount = Deserializer::int64($__payload, $__offset);

        return new self(
            $stars,
            $currency,
            $amount,
            $extended,
            $storeProduct
        );
    }
}