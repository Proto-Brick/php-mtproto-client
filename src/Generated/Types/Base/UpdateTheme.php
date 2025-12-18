<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateTheme
 */
final class UpdateTheme extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8216fba3;
    
    public string $predicate = 'updateTheme';
    
    /**
     * @param Theme $theme
     */
    public function __construct(
        public readonly Theme $theme
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->theme->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $theme = Theme::deserialize($__payload, $__offset);

        return new self(
            $theme
        );
    }
}