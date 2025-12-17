<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/statsGraphAsync
 */
final class StatsGraphAsync extends AbstractStatsGraph
{
    public const CONSTRUCTOR_ID = 0x4a27eb2d;
    
    public string $predicate = 'statsGraphAsync';
    
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $token = Deserializer::bytes($__payload, $__offset);

        return new self(
            $token
        );
    }
}