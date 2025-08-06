<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputReplyToStory
 */
final class InputReplyToStory extends AbstractInputReplyTo
{
    public const CONSTRUCTOR_ID = 0x5881323a;
    
    public string $_ = 'inputReplyToStory';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $storyId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $storyId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->storyId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($deserializer, $stream);
        $storyId = $deserializer->int32($stream);
        return new self(
            $peer,
            $storyId
        );
    }
}