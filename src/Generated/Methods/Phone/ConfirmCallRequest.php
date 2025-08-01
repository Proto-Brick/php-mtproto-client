<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Phone\AbstractPhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.confirmCall
 */
final class ConfirmCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 788404002;
    
    public string $_ = 'phone.confirmCall';
    
    public function getMethodName(): string
    {
        return 'phone.confirmCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPhoneCall::class;
    }
    /**
     * @param AbstractInputPhoneCall $peer
     * @param string $gA
     * @param int $keyFingerprint
     * @param AbstractPhoneCallProtocol $protocol
     */
    public function __construct(
        public readonly AbstractInputPhoneCall $peer,
        public readonly string $gA,
        public readonly int $keyFingerprint,
        public readonly AbstractPhoneCallProtocol $protocol
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->gA);
        $buffer .= $serializer->int64($this->keyFingerprint);
        $buffer .= $this->protocol->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}