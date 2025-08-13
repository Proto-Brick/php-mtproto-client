<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\StoryAlbum;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.createAlbum
 */
final class CreateAlbumRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xa36396e5;
    
    public string $predicate = 'stories.createAlbum';
    
    public function getMethodName(): string
    {
        return 'stories.createAlbum';
    }
    
    public function getResponseClass(): string
    {
        return StoryAlbum::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $title
     * @param list<int> $stories
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $title,
        public readonly array $stories
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfInts($this->stories);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}