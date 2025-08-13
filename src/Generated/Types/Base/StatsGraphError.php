<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/statsGraphError
 */
final class StatsGraphError extends AbstractStatsGraph
{
    public const CONSTRUCTOR_ID = 0xbedc9822;
    
    public string $predicate = 'statsGraphError';
    
    /**
     * @param string $error
     */
    public function __construct(
        public readonly string $error
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->error);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $error = Deserializer::bytes($stream);

        return new self(
            $error
        );
    }
}