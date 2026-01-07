<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/readParticipantDate
 */
final class ReadParticipantDate extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4a4ff172;
    
    public string $predicate = 'readParticipantDate';
    
    /**
     * @param int $userId
     * @param int $date
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $userId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);

        return new self(
            $userId,
            $date
        );
    }
}