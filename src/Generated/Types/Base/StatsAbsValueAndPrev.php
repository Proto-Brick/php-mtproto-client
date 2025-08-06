<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/statsAbsValueAndPrev
 */
final class StatsAbsValueAndPrev extends TlObject
{
    public const CONSTRUCTOR_ID = 0xcb43acde;
    
    public string $_ = 'statsAbsValueAndPrev';
    
    /**
     * @param float $current
     * @param float $previous
     */
    public function __construct(
        public readonly float $current,
        public readonly float $previous
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->current);
        $buffer .= pack('d', $this->previous);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $current = $deserializer->double($stream);
        $previous = $deserializer->double($stream);
        return new self(
            $current,
            $previous
        );
    }
}