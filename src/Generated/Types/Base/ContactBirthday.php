<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/contactBirthday
 */
final class ContactBirthday extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1d998733;
    
    public string $predicate = 'contactBirthday';
    
    /**
     * @param int $contactId
     * @param Birthday $birthday
     */
    public function __construct(
        public readonly int $contactId,
        public readonly Birthday $birthday
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->contactId);
        $buffer .= $this->birthday->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $contactId = Deserializer::int64($__payload, $__offset);
        $birthday = Birthday::deserialize($__payload, $__offset);

        return new self(
            $contactId,
            $birthday
        );
    }
}