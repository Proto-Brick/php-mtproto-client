<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Stories\Stories;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getStoriesArchive
 */
final class GetStoriesArchiveRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb4352016;
    
    public string $predicate = 'stories.getStoriesArchive';
    
    public function getMethodName(): string
    {
        return 'stories.getStoriesArchive';
    }
    
    public function getResponseClass(): string
    {
        return Stories::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->offsetId);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}