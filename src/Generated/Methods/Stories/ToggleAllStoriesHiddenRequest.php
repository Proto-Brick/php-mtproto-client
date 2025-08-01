<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.toggleAllStoriesHidden
 */
final class ToggleAllStoriesHiddenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2082822084;
    
    public string $_ = 'stories.toggleAllStoriesHidden';
    
    public function getMethodName(): string
    {
        return 'stories.toggleAllStoriesHidden';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool $hidden
     */
    public function __construct(
        public readonly bool $hidden
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->hidden ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}