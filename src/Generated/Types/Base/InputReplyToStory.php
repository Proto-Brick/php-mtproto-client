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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->storyId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($stream);
        $storyId = Deserializer::int32($stream);
        return new self(
            $peer,
            $storyId
        );
    }
}