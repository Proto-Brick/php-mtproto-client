<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/statsPercentValue
 */
final class StatsPercentValue extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcbce2fe0;
    
    public string $predicate = 'statsPercentValue';
    
    /**
     * @param float $part
     * @param float $total
     */
    public function __construct(
        public readonly float $part,
        public readonly float $total
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->part);
        $buffer .= pack('d', $this->total);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $part = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $total = unpack('d', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);

        return new self(
            $part,
            $total
        );
    }
}