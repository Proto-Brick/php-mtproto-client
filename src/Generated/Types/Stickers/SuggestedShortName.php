<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Stickers;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/stickers.suggestedShortName
 */
final class SuggestedShortName extends TlObject
{
    public const CONSTRUCTOR_ID = 0x85fea03f;
    
    public string $predicate = 'stickers.suggestedShortName';
    
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortName);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $shortName = Deserializer::bytes($__payload, $__offset);

        return new self(
            $shortName
        );
    }
}