<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/outboxReadDate
 */
final class OutboxReadDate extends AbstractOutboxReadDate
{
    public const CONSTRUCTOR_ID = 1001931436;
    
    public string $_ = 'outboxReadDate';
    
    /**
     * @param int $date
     */
    public function __construct(
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $date = $deserializer->int32($stream);
            return new self(
            $date
        );
    }
}