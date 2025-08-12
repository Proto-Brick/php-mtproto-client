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
    
    public string $predicate = 'businessWorkHours';
    
    /**
     * @param string $timezoneId
     * @param list<BusinessWeeklyOpen> $weeklyOpen
     * @param true|null $openNow
     */
    public function __construct(
        public readonly string $timezoneId,
        public readonly array $weeklyOpen,
        public readonly ?true $openNow = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->openNow) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->timezoneId);
        $buffer .= Serializer::vectorOfObjects($this->weeklyOpen);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $openNow = ($flags & (1 << 0)) ? true : null;
        $timezoneId = Deserializer::bytes($stream);
        $weeklyOpen = Deserializer::vectorOfObjects($stream, [BusinessWeeklyOpen::class, 'deserialize']);

        return new self(
            $timezoneId,
            $weeklyOpen,
            $openNow
        );
    }
}