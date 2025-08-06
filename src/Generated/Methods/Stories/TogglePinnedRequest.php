<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.togglePinned
 */
final class TogglePinnedRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9a75a1ef;
    
    public string $_ = 'stories.togglePinned';
    
    public function getMethodName(): string
    {
        return 'stories.togglePinned';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param list<int> $id
     * @param bool $pinned
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly array $id,
        public readonly bool $pinned
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->vectorOfInts($this->id);
        $buffer .= ($this->pinned ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}