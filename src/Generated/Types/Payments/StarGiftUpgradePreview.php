<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractStarGiftAttribute;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.starGiftUpgradePreview
 */
final class StarGiftUpgradePreview extends TlObject
{
    public const CONSTRUCTOR_ID = 0x167bd90b;
    
    public string $predicate = 'payments.starGiftUpgradePreview';
    
    /**
     * @param list<AbstractStarGiftAttribute> $sampleAttributes
     */
    public function __construct(
        public readonly array $sampleAttributes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->sampleAttributes);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $sampleAttributes = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractStarGiftAttribute::class, 'deserialize']);

        return new self(
            $sampleAttributes
        );
    }
}