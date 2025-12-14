<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/businessWeeklyOpen
 */
final class BusinessWeeklyOpen extends TlObject
{
    public const CONSTRUCTOR_ID = 0x120b1ab9;
    
    public string $predicate = 'businessWeeklyOpen';
    
    /**
     * @param int $startMinute
     * @param int $endMinute
     */
    public function __construct(
        public readonly int $startMinute,
        public readonly int $endMinute
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->startMinute);
        $buffer .= Serializer::int32($this->endMinute);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $startMinute = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $endMinute = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);

        return new self(
            $startMinute,
            $endMinute
        );
    }
}