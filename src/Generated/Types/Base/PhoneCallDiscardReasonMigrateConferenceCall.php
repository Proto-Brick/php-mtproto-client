<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallDiscardReasonMigrateConferenceCall
 */
final class PhoneCallDiscardReasonMigrateConferenceCall extends AbstractPhoneCallDiscardReason
{
    public const CONSTRUCTOR_ID = 0x9fbbf1f7;
    
    public string $predicate = 'phoneCallDiscardReasonMigrateConferenceCall';
    
    /**
     * @param string $slug
     */
    public function __construct(
        public readonly string $slug
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->slug);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $slug = Deserializer::bytes($__payload, $__offset);

        return new self(
            $slug
        );
    }
}