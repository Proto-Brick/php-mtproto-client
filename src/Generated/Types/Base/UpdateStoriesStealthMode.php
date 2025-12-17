<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateStoriesStealthMode
 */
final class UpdateStoriesStealthMode extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x2c084dc1;
    
    public string $predicate = 'updateStoriesStealthMode';
    
    /**
     * @param StoriesStealthMode $stealthMode
     */
    public function __construct(
        public readonly StoriesStealthMode $stealthMode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stealthMode->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $stealthMode = StoriesStealthMode::deserialize($__payload, $__offset);

        return new self(
            $stealthMode
        );
    }
}