<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/birthday
 */
final class Birthday extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6c8e1e06;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->year !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->day);
        $buffer .= Serializer::int32($this->month);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->year);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $day = Deserializer::int32($stream);
        $month = Deserializer::int32($stream);
        $year = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        return new self(
            $day,
            $month,
            $year
        );
    }
}