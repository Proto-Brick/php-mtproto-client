<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGiftAttribute;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.starGiftUpgradeAttributes
 */
final class StarGiftUpgradeAttributes extends TlObject
{
    public const CONSTRUCTOR_ID = 0x46c6e36f;
    
    public string $predicate = 'payments.starGiftUpgradeAttributes';
    
    /**
     * @param list<AbstractStarGiftAttribute> $attributes
     */
    public function __construct(
        public readonly array $attributes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->attributes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $attributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarGiftAttribute::class, 'deserialize']);

        return new self(
            $attributes
        );
    }
}