<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ShippingOption;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.validatedRequestedInfo
 */
final class ValidatedRequestedInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd1451883;
    
    public string $predicate = 'payments.validatedRequestedInfo';
    
    /**
     * @param string|null $id
     * @param list<ShippingOption>|null $shippingOptions
     */
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?array $shippingOptions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->id !== null) {
            $flags |= (1 << 0);
        }
        if ($this->shippingOptions !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->id);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->shippingOptions);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $id = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($stream) : null;
        $shippingOptions = (($flags & (1 << 1)) !== 0) ? Deserializer::vectorOfObjects($stream, [ShippingOption::class, 'deserialize']) : null;

        return new self(
            $id,
            $shippingOptions
        );
    }
}