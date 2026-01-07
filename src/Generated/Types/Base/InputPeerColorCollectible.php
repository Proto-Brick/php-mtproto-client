<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPeerColorCollectible
 */
final class InputPeerColorCollectible extends AbstractPeerColor
{
    public const CONSTRUCTOR_ID = 0xb8ea86a9;
    
    public string $predicate = 'inputPeerColorCollectible';
    
    /**
     * @param int $collectibleId
     */
    public function __construct(
        public readonly int $collectibleId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->collectibleId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $collectibleId = Deserializer::int64($__payload, $__offset);

        return new self(
            $collectibleId
        );
    }
}