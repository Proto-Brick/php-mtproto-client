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
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $contactId = Deserializer::int64($stream);
        $birthday = Birthday::deserialize($stream);

        return new self(
            $contactId,
            $birthday
        );
    }
}