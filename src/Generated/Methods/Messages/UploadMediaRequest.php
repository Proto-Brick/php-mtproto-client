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
    public const CONSTRUCTOR_ID = 0x14967978;
    
    public string $predicate = 'messages.uploadMedia';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->businessConnectionId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->businessConnectionId);
        }
        $buffer .= $this->peer->serialize();
        $buffer .= $this->media->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}