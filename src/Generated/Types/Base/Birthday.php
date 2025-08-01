<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/birthday
 */
final class Birthday extends AbstractBirthday
{
    public const CONSTRUCTOR_ID = 1821253126;
    
    public string $_ = 'birthday';
    
    /**
     * @param int $day
     * @param int $month
     * @param int|null $year
     */
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly ?int $year = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->year !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->day);
        $buffer .= $serializer->int32($this->month);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->year);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $day = $deserializer->int32($stream);
        $month = $deserializer->int32($stream);
        $year = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
            return new self(
            $day,
            $month,
            $year
        );
    }
}