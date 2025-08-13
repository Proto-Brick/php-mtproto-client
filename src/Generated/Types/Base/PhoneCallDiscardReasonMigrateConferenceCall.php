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
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $slug = Deserializer::bytes($stream);

        return new self(
            $slug
        );
    }
}