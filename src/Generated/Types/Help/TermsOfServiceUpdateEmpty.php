<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.termsOfServiceUpdateEmpty
 */
final class TermsOfServiceUpdateEmpty extends AbstractTermsOfServiceUpdate
{
    public const CONSTRUCTOR_ID = 0xe3309f7f;
    
    public string $predicate = 'help.termsOfServiceUpdateEmpty';
    
    /**
     * @param int $expires
     */
    public function __construct(
        public readonly int $expires
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->expires);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $expires = Deserializer::int32($__payload, $__offset);

        return new self(
            $expires
        );
    }
}