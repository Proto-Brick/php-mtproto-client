<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputMediaStory
 */
final class InputMediaStory extends AbstractInputMedia
{
    public const CONSTRUCTOR_ID = 0x89fdd778;
    
    public string $_ = 'inputMediaStory';
    
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $peer = AbstractInputPeer::deserialize($stream);
        $id = Deserializer::int32($stream);
        return new self(
            $peer,
            $id
        );
    }
}