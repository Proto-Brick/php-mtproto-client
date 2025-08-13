<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starsTonAmount
 */
final class StarsTonAmount extends AbstractStarsAmount
{
    public const CONSTRUCTOR_ID = 0x74aee3e0;
    
    public string $predicate = 'starsTonAmount';
    
    /**
     * @param int $amount
     */
    public function __construct(
        public readonly int $amount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->amount);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $amount = Deserializer::int64($stream);

        return new self(
            $amount
        );
    }
}