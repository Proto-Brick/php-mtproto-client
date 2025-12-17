<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateLangPack
 */
final class UpdateLangPack extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x56022f4d;
    
    public string $predicate = 'updateLangPack';
    
    /**
     * @param LangPackDifference $difference
     */
    public function __construct(
        public readonly LangPackDifference $difference
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->difference->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $difference = LangPackDifference::deserialize($__payload, $__offset);

        return new self(
            $difference
        );
    }
}