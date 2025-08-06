<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBotIcon
 */
final class AttachMenuBotIcon extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb2a7386b;
    
    public string $_ = 'attachMenuBotIcon';
    
    /**
     * @param string $name
     * @param AbstractDocument $icon
     * @param list<AttachMenuBotIconColor>|null $colors
     */
    public function __construct(
        public readonly string $name,
        public readonly AbstractDocument $icon,
        public readonly ?array $colors = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->colors !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->name);
        $buffer .= $this->icon->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->colors);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $name = $deserializer->bytes($stream);
        $icon = AbstractDocument::deserialize($deserializer, $stream);
        $colors = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AttachMenuBotIconColor::class, 'deserialize']) : null;
        return new self(
            $name,
            $icon,
            $colors
        );
    }
}