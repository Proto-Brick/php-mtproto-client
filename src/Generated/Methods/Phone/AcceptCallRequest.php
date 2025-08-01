<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractPhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.acceptCall
 */
final class AcceptCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1003664544;
    
    public string $_ = 'phone.acceptCall';
    
    public function getMethodName(): string
    {
        return 'phone.acceptCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPhoneCall::class;
    }
    /**
     * @param AbstractInputPhoneCall $peer
     * @param string $gB
     * @param AbstractPhoneCallProtocol $protocol
     */
    public function __construct(
        public readonly AbstractInputPhoneCall $peer,
        public readonly string $gB,
        public readonly AbstractPhoneCallProtocol $protocol
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->gB);
        $buffer .= $this->protocol->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}