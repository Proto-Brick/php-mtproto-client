<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsGiftOption
 */
final class StarsGiftOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5e0589f1;
    
    public string $predicate = 'starsGiftOption';
    
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
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $extended = (($flags & (1 << 1)) !== 0) ? true : null;
        $stars = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $storeProduct = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $currency = Deserializer::bytes($stream);
        $amount = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $stars,
            $currency,
            $amount,
            $extended,
            $storeProduct
        );
    }
}