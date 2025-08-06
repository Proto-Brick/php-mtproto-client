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
    
    public string $_ = 'stories.getAllStories';
    
    public function getMethodName(): string
    {
        return 'stories.getAllStories';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAllStories::class;
    }
    /**
     * @param bool|null $next
     * @param bool|null $hidden
     * @param string|null $state
     */
    public function __construct(
        public readonly ?bool $next = null,
        public readonly ?bool $hidden = null,
        public readonly ?string $state = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->next) $flags |= (1 << 1);
        if ($this->hidden) $flags |= (1 << 2);
        if ($this->state !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->state);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}