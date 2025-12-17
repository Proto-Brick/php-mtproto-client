<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/pageTableRow
 */
final class PageTableRow extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe0c0c5e5;
    
    public string $predicate = 'pageTableRow';
    
    /**
     * @param list<PageTableCell> $cells
     */
    public function __construct(
        public readonly array $cells
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->cells);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $cells = Deserializer::vectorOfObjects($__payload, $__offset, [PageTableCell::class, 'deserialize']);

        return new self(
            $cells
        );
    }
}