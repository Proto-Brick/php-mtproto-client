<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractGroupCallStreamRtmpUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallStreamRtmpUrl
 */
final class GetGroupCallStreamRtmpUrlRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3736316863;
    
    public string $_ = 'phone.getGroupCallStreamRtmpUrl';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallStreamRtmpUrl';
    }
    
    public function getResponseClass(): string
    {
        return AbstractGroupCallStreamRtmpUrl::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param bool $revoke
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly bool $revoke
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= ($this->revoke ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}