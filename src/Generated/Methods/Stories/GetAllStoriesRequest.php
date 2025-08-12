<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractAllStories;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getAllStories
 */
final class GetAllStoriesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xeeb0d625;
    
    public string $predicate = 'stories.getAllStories';
    
    public function getMethodName(): string
    {
        return 'stories.getAllStories';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAllStories::class;
    }
    /**
     * @param true|null $next
     * @param true|null $hidden
     * @param string|null $state
     */
    public function __construct(
        public readonly ?true $next = null,
        public readonly ?true $hidden = null,
        public readonly ?string $state = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->next) $flags |= (1 << 1);
        if ($this->hidden) $flags |= (1 << 2);
        if ($this->state !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->state);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}