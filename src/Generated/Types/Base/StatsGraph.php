<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsGraph
 */
final class StatsGraph extends AbstractStatsGraph
{
    public const CONSTRUCTOR_ID = 0x8ea464b6;
    
    public string $_ = 'statsGraph';
    
    /**
     * @param array $json
     * @param string|null $zoomToken
     */
    public function __construct(
        public readonly array $json,
        public readonly ?string $zoomToken = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->zoomToken !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes(json_encode($this->json, JSON_FORCE_OBJECT));
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->zoomToken);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $json = $deserializer->deserializeDataJSON($stream);
        $zoomToken = ($flags & (1 << 0)) ? $deserializer->bytes($stream) : null;
        return new self(
            $json,
            $zoomToken
        );
    }
}