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
    public const CONSTRUCTOR_ID = 3149313187;
    
    public string $_ = 'starsAmount';
    
    /**
     * @param int $amount
     * @param int $nanos
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $nanos
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int32($this->nanos);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $amount = $deserializer->int64($stream);
        $nanos = $deserializer->int32($stream);
            return new self(
            $amount,
            $nanos
        );
    }
}