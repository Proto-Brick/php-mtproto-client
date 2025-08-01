<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessWeeklyOpen
 */
final class BusinessWeeklyOpen extends AbstractBusinessWeeklyOpen
{
    public const CONSTRUCTOR_ID = 302717625;
    
    public string $_ = 'businessWeeklyOpen';
    
    /**
     * @param int $startMinute
     * @param int $endMinute
     */
    public function __construct(
        public readonly int $startMinute,
        public readonly int $endMinute
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->startMinute);
        $buffer .= $serializer->int32($this->endMinute);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $startMinute = $deserializer->int32($stream);
        $endMinute = $deserializer->int32($stream);
            return new self(
            $startMinute,
            $endMinute
        );
    }
}