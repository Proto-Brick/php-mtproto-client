<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\Timezone;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.timezonesList
 */
final class TimezonesList extends AbstractTimezonesList
{
    public const CONSTRUCTOR_ID = 0x7b74ed71;
    
    public string $_ = 'help.timezonesList';
    
    /**
     * @param list<Timezone> $timezones
     * @param int $hash
     */
    public function __construct(
        public readonly array $timezones,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->timezones);
        $buffer .= $serializer->int32($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $timezones = $deserializer->vectorOfObjects($stream, [Timezone::class, 'deserialize']);
        $hash = $deserializer->int32($stream);
        return new self(
            $timezones,
            $hash
        );
    }
}