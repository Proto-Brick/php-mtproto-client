<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/sponsoredMessageReportOption
 */
final class SponsoredMessageReportOption extends TlObject
{
    public const CONSTRUCTOR_ID = 0x430d3150;
    
    public string $predicate = 'sponsoredMessageReportOption';
    
    /**
     * @param string $text
     * @param string $option
     */
    public function __construct(
        public readonly string $text,
        public readonly string $option
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->text);
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $text = Deserializer::bytes($__payload, $__offset);
        $option = Deserializer::bytes($__payload, $__offset);

        return new self(
            $text,
            $option
        );
    }
}