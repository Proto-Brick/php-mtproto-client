<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stories\AbstractStoryViews;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getStoriesViews
 */
final class GetStoriesViewsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 685862088;
    
    public string $_ = 'stories.getStoriesViews';
    
    public function getMethodName(): string
    {
        return 'stories.getStoriesViews';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStoryViews::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}