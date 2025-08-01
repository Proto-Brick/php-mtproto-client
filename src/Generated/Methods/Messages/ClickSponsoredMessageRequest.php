<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.clickSponsoredMessage
 */
final class ClickSponsoredMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 252261477;
    
    public string $_ = 'messages.clickSponsoredMessage';
    
    public function getMethodName(): string
    {
        return 'messages.clickSponsoredMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $randomId
     * @param bool|null $media
     * @param bool|null $fullscreen
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $randomId,
        public readonly ?bool $media = null,
        public readonly ?bool $fullscreen = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->media) $flags |= (1 << 0);
        if ($this->fullscreen) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->randomId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}