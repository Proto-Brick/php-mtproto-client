<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Messages;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/messages.dhConfig
 */
final class DhConfig extends AbstractDhConfig
{
    public const CONSTRUCTOR_ID = 0x2c221edd;
    
    public string $predicate = 'messages.dhConfig';
    
    /**
     * @param int $g
     * @param string $p
     * @param int $version
     * @param string $random
     */
    public function __construct(
        public readonly int $g,
        public readonly string $p,
        public readonly int $version,
        public readonly string $random
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->g);
        $buffer .= Serializer::bytes($this->p);
        $buffer .= Serializer::int32($this->version);
        $buffer .= Serializer::bytes($this->random);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $g = Deserializer::int32($__payload, $__offset);
        $p = Deserializer::bytes($__payload, $__offset);
        $version = Deserializer::int32($__payload, $__offset);
        $random = Deserializer::bytes($__payload, $__offset);

        return new self(
            $g,
            $p,
            $version,
            $random
        );
    }
}