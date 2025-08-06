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
    
    public string $_ = 'statsPercentValue';
    
    /**
     * @param float $part
     * @param float $total
     */
    public function __construct(
        public readonly float $part,
        public readonly float $total
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->part);
        $buffer .= pack('d', $this->total);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $part = $deserializer->double($stream);
        $total = $deserializer->double($stream);
        return new self(
            $part,
            $total
        );
    }
}