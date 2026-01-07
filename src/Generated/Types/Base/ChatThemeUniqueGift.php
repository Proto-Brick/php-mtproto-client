<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/chatThemeUniqueGift
 */
final class ChatThemeUniqueGift extends AbstractChatTheme
{
    public const CONSTRUCTOR_ID = 0x3458f9c8;
    
    public string $predicate = 'chatThemeUniqueGift';
    
    /**
     * @param AbstractStarGift $gift
     * @param list<ThemeSettings> $themeSettings
     */
    public function __construct(
        public readonly AbstractStarGift $gift,
        public readonly array $themeSettings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->gift->serialize();
        $buffer .= Serializer::vectorOfObjects($this->themeSettings);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $gift = AbstractStarGift::deserialize($__payload, $__offset);
        $themeSettings = Deserializer::vectorOfObjects($__payload, $__offset, [ThemeSettings::class, 'deserialize']);

        return new self(
            $gift,
            $themeSettings
        );
    }
}