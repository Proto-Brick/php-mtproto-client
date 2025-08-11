<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.togglePeerStoriesHidden
 */
final class TogglePeerStoriesHiddenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xbd0415c4;
    
    public string $_ = 'stories.togglePeerStoriesHidden';
    
    public function getMethodName(): string
    {
        return 'stories.togglePeerStoriesHidden';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool $hidden
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly bool $hidden
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= ($this->hidden ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}