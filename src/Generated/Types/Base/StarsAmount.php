<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsAmount
 */
final class StarsAmount extends AbstractStarsAmount
{
    public const CONSTRUCTOR_ID = 0xbbb6b4a3;
    
    public string $predicate = 'starsAmount';
    
    /**
     * @param int $amount
     * @param int $nanos
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $nanos
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->nanos);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $amount = Deserializer::int64($stream);
        $nanos = Deserializer::int32($stream);

        return new self(
            $amount,
            $nanos
        );
    }
}