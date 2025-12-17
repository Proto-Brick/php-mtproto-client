<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputCollectiblePhone
 */
final class InputCollectiblePhone extends AbstractInputCollectible
{
    public const CONSTRUCTOR_ID = 0xa2e214a4;
    
    public string $predicate = 'inputCollectiblePhone';
    
    /**
     * @param string $phone
     */
    public function __construct(
        public readonly string $phone
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phone);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $phone = Deserializer::bytes($__payload, $__offset);

        return new self(
            $phone
        );
    }
}