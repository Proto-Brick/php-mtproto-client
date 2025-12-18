<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateLangPackTooLong
 */
final class UpdateLangPackTooLong extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x46560264;
    
    public string $predicate = 'updateLangPackTooLong';
    
    /**
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $langCode = Deserializer::bytes($__payload, $__offset);

        return new self(
            $langCode
        );
    }
}