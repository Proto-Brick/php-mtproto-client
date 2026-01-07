<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/dialogFilterSuggested
 */
final class DialogFilterSuggested extends TlObject
{
    public const CONSTRUCTOR_ID = 0x77744d4a;
    
    public string $predicate = 'dialogFilterSuggested';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param string $description
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly string $description
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->filter->serialize();
        $buffer .= Serializer::bytes($this->description);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $filter = AbstractDialogFilter::deserialize($__payload, $__offset);
        $description = Deserializer::bytes($__payload, $__offset);

        return new self(
            $filter,
            $description
        );
    }
}