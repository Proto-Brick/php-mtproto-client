<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessWeeklyOpen
 */
final class BusinessWeeklyOpen extends TlObject
{
    public const CONSTRUCTOR_ID = 0x120b1ab9;
    
    public string $_ = 'businessWeeklyOpen';
    
    /**
     * @param int $startMinute
     * @param int $endMinute
     */
    public function __construct(
        public readonly int $startMinute,
        public readonly int $endMinute
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->startMinute);
        $buffer .= Serializer::int32($this->endMinute);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $startMinute = Deserializer::int32($stream);
        $endMinute = Deserializer::int32($stream);
        return new self(
            $startMinute,
            $endMinute
        );
    }
}