<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateStarsBalance
 */
final class UpdateStarsBalance extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x4e80a379;
    
    public string $_ = 'updateStarsBalance';
    
    /**
     * @param StarsAmount $balance
     */
    public function __construct(
        public readonly StarsAmount $balance
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->balance->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $balance = StarsAmount::deserialize($deserializer, $stream);
        return new self(
            $balance
        );
    }
}