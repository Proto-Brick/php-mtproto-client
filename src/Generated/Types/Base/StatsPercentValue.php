<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $part = Deserializer::double($stream);
        $total = Deserializer::double($stream);

        return new self(
            $part,
            $total
        );
    }
}