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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $extended = (($flags & (1 << 1)) !== 0) ? true : null;
        $stars = Deserializer::int64($stream);
        $storeProduct = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = Deserializer::int64($stream);

        return new self(
            $stars,
            $currency,
            $amount,
            $extended,
            $storeProduct
        );
    }
}