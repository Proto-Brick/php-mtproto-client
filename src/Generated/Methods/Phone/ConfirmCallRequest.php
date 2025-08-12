<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallProtocol;
use DigitalStars\MtprotoClient\Generated\Types\Phone\PhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.confirmCall
 */
final class ConfirmCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2efe1722;
    
    public string $predicate = 'phone.confirmCall';
    
    public function getMethodName(): string
    {
        return 'phone.confirmCall';
    }
    
    public function getResponseClass(): string
    {
        return PhoneCall::class;
    }
    /**
     * @param InputPhoneCall $peer
     * @param string $gA
     * @param int $keyFingerprint
     * @param PhoneCallProtocol $protocol
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly string $gA,
        public readonly int $keyFingerprint,
        public readonly PhoneCallProtocol $protocol
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->gA);
        $buffer .= Serializer::int64($this->keyFingerprint);
        $buffer .= $this->protocol->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}