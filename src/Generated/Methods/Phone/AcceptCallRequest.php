<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Phone\PhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.acceptCall
 */
final class AcceptCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3bd2b4a0;
    
    public string $_ = 'phone.acceptCall';
    
    public function getMethodName(): string
    {
        return 'phone.acceptCall';
    }
    
    public function getResponseClass(): string
    {
        return PhoneCall::class;
    }
    /**
     * @param InputPhoneCall $peer
     * @param string $gB
     * @param PhoneCallProtocol $protocol
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly string $gB,
        public readonly PhoneCallProtocol $protocol
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