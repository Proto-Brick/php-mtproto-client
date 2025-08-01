<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaGame
 */
final class InputMediaGame extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 3544138739;
    
    public string $_ = 'inputMediaGame';
    
    /**
     * @param AbstractInputGame $id
     */
    public function __construct(
        public readonly AbstractInputGame $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $id = AbstractInputGame::deserialize($deserializer, $stream);
            return new self(
            $id
        );
    }
}