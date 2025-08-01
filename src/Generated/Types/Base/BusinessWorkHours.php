<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessWorkHours
 */
final class BusinessWorkHours extends AbstractBusinessWorkHours
{
    public const CONSTRUCTOR_ID = 2358423704;
    
    public string $_ = 'businessWorkHours';
    
    /**
     * @param string $timezoneId
     * @param list<AbstractBusinessWeeklyOpen> $weeklyOpen
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $openNow = ($flags & (1 << 0)) ? true : null;
        $timezoneId = $deserializer->bytes($stream);
        $weeklyOpen = $deserializer->vectorOfObjects($stream, [AbstractBusinessWeeklyOpen::class, 'deserialize']);
            return new self(
            $timezoneId,
            $weeklyOpen,
            $openNow
        );
    }
}