<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/businessAwayMessageScheduleAlways
 */
final class BusinessAwayMessageScheduleAlways extends AbstractBusinessAwayMessageSchedule
{
    public const CONSTRUCTOR_ID = 0xc9b9e2b9;
    
    public string $_ = 'businessAwayMessageScheduleAlways';
    
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.

        return new self();
    }
}