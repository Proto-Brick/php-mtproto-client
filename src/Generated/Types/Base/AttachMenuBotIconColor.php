<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBotIconColor
 */
final class AttachMenuBotIconColor extends AbstractAttachMenuBotIconColor
{
    public const CONSTRUCTOR_ID = 1165423600;
    
    public string $_ = 'attachMenuBotIconColor';
    
    /**
     * @param string $name
     * @param int $color
     */
    public function __construct(
        public readonly string $name,
        public readonly int $color
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->name);
        $buffer .= $serializer->int32($this->color);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $name = $deserializer->bytes($stream);
        $color = $deserializer->int32($stream);
            return new self(
            $name,
            $color
        );
    }
}