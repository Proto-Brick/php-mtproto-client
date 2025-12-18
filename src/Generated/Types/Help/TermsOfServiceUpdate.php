<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/help.termsOfServiceUpdate
 */
final class TermsOfServiceUpdate extends AbstractTermsOfServiceUpdate
{
    public const CONSTRUCTOR_ID = 0x28ecf961;
    
    public string $predicate = 'help.termsOfServiceUpdate';
    
    /**
     * @param int $expires
     * @param TermsOfService $termsOfService
     */
    public function __construct(
        public readonly int $expires,
        public readonly TermsOfService $termsOfService
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->expires);
        $buffer .= $this->termsOfService->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $expires = Deserializer::int32($__payload, $__offset);
        $termsOfService = TermsOfService::deserialize($__payload, $__offset);

        return new self(
            $expires,
            $termsOfService
        );
    }
}