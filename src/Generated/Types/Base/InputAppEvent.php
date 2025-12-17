<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/inputAppEvent
 */
final class InputAppEvent extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1d1b1245;
    
    public string $predicate = 'inputAppEvent';
    
    /**
     * @param float $time
     * @param string $type
     * @param int $peer
     * @param array $data
     */
    public function __construct(
        public readonly float $time,
        public readonly string $type,
        public readonly int $peer,
        public readonly array $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->time);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::int64($this->peer);
        $buffer .= Serializer::serializeJsonValue($this->data);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $time = Deserializer::double($__payload, $__offset);
        $type = Deserializer::bytes($__payload, $__offset);
        $peer = Deserializer::int64($__payload, $__offset);
        $data = Deserializer::deserializeJsonValue($__payload, $__offset);

        return new self(
            $time,
            $type,
            $peer,
            $data
        );
    }
}