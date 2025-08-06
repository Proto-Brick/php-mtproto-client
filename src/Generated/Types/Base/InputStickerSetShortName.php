<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStickerSetShortName
 */
final class InputStickerSetShortName extends AbstractInputStickerSet
{
    public const CONSTRUCTOR_ID = 0x861cc8a0;
    
    public string $_ = 'inputStickerSetShortName';
    
    /**
     * @param string $shortName
     */
    public function __construct(
        public readonly string $shortName
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->shortName);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $shortName = $deserializer->bytes($stream);
        return new self(
            $shortName
        );
    }
}