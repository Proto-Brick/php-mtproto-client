<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Updates;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updates.differenceEmpty
 */
final class DifferenceEmpty extends AbstractDifference
{
    public const CONSTRUCTOR_ID = 0x5d75a138;
    
    public string $_ = 'updates.differenceEmpty';
    
    /**
     * @param int $date
     * @param int $seq
     */
    public function __construct(
        public readonly int $date,
        public readonly int $seq
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->seq);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $date = Deserializer::int32($stream);
        $seq = Deserializer::int32($stream);
        return new self(
            $date,
            $seq
        );
    }
}