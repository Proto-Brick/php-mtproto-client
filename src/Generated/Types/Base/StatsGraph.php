<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/statsGraph
 */
final class StatsGraph extends AbstractStatsGraph
{
    public const CONSTRUCTOR_ID = 0x8ea464b6;
    
    public string $predicate = 'statsGraph';
    
    /**
     * @param array $json
     * @param string|null $zoomToken
     */
    public function __construct(
        public readonly array $json,
        public readonly ?string $zoomToken = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->zoomToken !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::serializeDataJSON($this->json);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->zoomToken);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $json = Deserializer::deserializeDataJSON($__payload, $__offset);
        $zoomToken = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $json,
            $zoomToken
        );
    }
}