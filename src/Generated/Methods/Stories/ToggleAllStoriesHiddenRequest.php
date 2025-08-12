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
    public const CONSTRUCTOR_ID = 0x7c2557c4;
    
    public string $predicate = 'stories.toggleAllStoriesHidden';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= ($this->hidden ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}