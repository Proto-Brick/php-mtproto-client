<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/accountDaysTTL
 */
final class AccountDaysTTL extends AbstractAccountDaysTTL
{
    public const CONSTRUCTOR_ID = 3100684255;
    
    public string $_ = 'accountDaysTTL';
    
    /**
     * @param int $days
     */
    public function __construct(
        public readonly int $days
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->days);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $days = $deserializer->int32($stream);
            return new self(
            $days
        );
    }
}