<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/phoneCallEmpty
 */
final class PhoneCallEmpty extends AbstractPhoneCall
{
    public const CONSTRUCTOR_ID = 0x5366c915;
    
    public string $predicate = 'phoneCallEmpty';
    
    /**
     * @param int $id
     */
    public function __construct(
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $id = Deserializer::int64($__payload, $__offset);

        return new self(
            $id
        );
    }
}