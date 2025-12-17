<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\StarGiftCollection;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/payments.starGiftCollections
 */
final class StarGiftCollections extends AbstractStarGiftCollections
{
    public const CONSTRUCTOR_ID = 0x8a2932f3;
    
    public string $predicate = 'payments.starGiftCollections';
    
    /**
     * @param list<StarGiftCollection> $collections
     */
    public function __construct(
        public readonly array $collections
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->collections);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $collections = Deserializer::vectorOfObjects($__payload, $__offset, [StarGiftCollection::class, 'deserialize']);

        return new self(
            $collections
        );
    }
}