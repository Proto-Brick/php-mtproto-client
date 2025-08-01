<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.uploadMedia
 */
final class UploadMediaRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 345405816;
    
    public string $_ = 'messages.uploadMedia';
    
    public function getMethodName(): string
    {
        return 'messages.uploadMedia';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessageMedia::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputMedia $media
     * @param string|null $businessConnectionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputMedia $media,
        public readonly ?string $businessConnectionId = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->businessConnectionId !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->businessConnectionId);
        }
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->media->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}