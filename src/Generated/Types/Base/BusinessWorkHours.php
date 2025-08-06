<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessWorkHours
 */
final class BusinessWorkHours extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c92b098;
    
    public string $_ = 'businessWorkHours';
    
    /**
     * @param string $timezoneId
     * @param list<BusinessWeeklyOpen> $weeklyOpen
     * @param bool|null $openNow
     */
    public function __construct(
        public readonly string $timezoneId,
        public readonly array $weeklyOpen,
        public readonly ?bool $openNow = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->openNow) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->timezoneId);
        $buffer .= $serializer->vectorOfObjects($this->weeklyOpen);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $openNow = ($flags & (1 << 0)) ? true : null;
        $timezoneId = $deserializer->bytes($stream);
        $weeklyOpen = $deserializer->vectorOfObjects($stream, [BusinessWeeklyOpen::class, 'deserialize']);
        return new self(
            $timezoneId,
            $weeklyOpen,
            $openNow
        );
    }
}