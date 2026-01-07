<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stories;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stories.canSendStoryCount
 */
final class CanSendStoryCount extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc387c04e;
    
    public string $predicate = 'stories.canSendStoryCount';
    
    /**
     * @param int $countRemains
     */
    public function __construct(
        public readonly int $countRemains
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->countRemains);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $countRemains = Deserializer::int32($__payload, $__offset);

        return new self(
            $countRemains
        );
    }
}