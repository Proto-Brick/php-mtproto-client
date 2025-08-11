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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->colors !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->name);
        $buffer .= $this->icon->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->colors);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $name = Deserializer::bytes($stream);
        $icon = AbstractDocument::deserialize($stream);
        $colors = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AttachMenuBotIconColor::class, 'deserialize']) : null;
        return new self(
            $name,
            $icon,
            $colors
        );
    }
}