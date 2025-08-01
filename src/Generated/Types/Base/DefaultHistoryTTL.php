<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/defaultHistoryTTL
 */
final class DefaultHistoryTTL extends AbstractDefaultHistoryTTL
{
    public const CONSTRUCTOR_ID = 1135897376;
    
    public string $_ = 'defaultHistoryTTL';
    
    /**
     * @param int $period
     */
    public function __construct(
        public readonly int $period
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->period);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $period = $deserializer->int32($stream);
            return new self(
            $period
        );
    }
}