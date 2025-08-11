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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->country);
        $buffer .= Serializer::int32($this->thisDc);
        $buffer .= Serializer::int32($this->nearestDc);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $country = Deserializer::bytes($stream);
        $thisDc = Deserializer::int32($stream);
        $nearestDc = Deserializer::int32($stream);
        return new self(
            $country,
            $thisDc,
            $nearestDc
        );
    }
}