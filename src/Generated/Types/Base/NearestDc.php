<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/nearestDc
 */
final class NearestDc extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8e1a1775;
    
    public string $_ = 'nearestDc';
    
    /**
     * @param string $country
     * @param int $thisDc
     * @param int $nearestDc
     */
    public function __construct(
        public readonly string $country,
        public readonly int $thisDc,
        public readonly int $nearestDc
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->country);
        $buffer .= $serializer->int32($this->thisDc);
        $buffer .= $serializer->int32($this->nearestDc);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $country = $deserializer->bytes($stream);
        $thisDc = $deserializer->int32($stream);
        $nearestDc = $deserializer->int32($stream);
        return new self(
            $country,
            $thisDc,
            $nearestDc
        );
    }
}