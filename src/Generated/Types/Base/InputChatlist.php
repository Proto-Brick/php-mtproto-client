<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputChatlistDialogFilter
 */
final class InputChatlist extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf3e0da33;
    
    public string $predicate = 'inputChatlistDialogFilter';
    
    /**
     * @param int $filterId
     */
    public function __construct(
        public readonly int $filterId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->filterId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $filterId = Deserializer::int32($__payload, $__offset);

        return new self(
            $filterId
        );
    }
}