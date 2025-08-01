<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateShort
 */
final class UpdateShort extends AbstractUpdates
{
    public const CONSTRUCTOR_ID = 2027216577;
    
    public string $_ = 'updateShort';
    
    /**
     * @param AbstractUpdate $update
     * @param int $date
     */
    public function __construct(
        public readonly AbstractUpdate $update,
        public readonly int $date
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->update->serialize($serializer);
        $buffer .= $serializer->int32($this->date);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $update = AbstractUpdate::deserialize($deserializer, $stream);
        $date = $deserializer->int32($stream);
            return new self(
            $update,
            $date
        );
    }
}