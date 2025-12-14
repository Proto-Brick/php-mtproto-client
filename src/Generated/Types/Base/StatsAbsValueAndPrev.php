<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsAbsValueAndPrev
 */
final class StatsAbsValueAndPrev extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb43acde;
    
    public string $predicate = 'statsAbsValueAndPrev';
    
    /**
     * @param float $current
     * @param float $previous
     */
    public function __construct(
        public readonly float $current,
        public readonly float $previous
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->current);
        $buffer .= pack('d', $this->previous);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $current = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $previous = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $current,
            $previous
        );
    }
}