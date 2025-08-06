<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaDice
 */
final class InputMediaDice extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0xe66fbf7b;
    
    public string $_ = 'inputMediaDice';
    
    /**
     * @param string $emoticon
     */
    public function __construct(
        public readonly string $emoticon
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $emoticon = $deserializer->bytes($stream);
        return new self(
            $emoticon
        );
    }
}