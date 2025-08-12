<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\PhoneCallDiscardReason;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.discardCall
 */
final class DiscardCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb2cbc1c0;
    
    public string $predicate = 'phone.discardCall';
    
    public function getMethodName(): string
    {
        return 'phone.discardCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputPhoneCall $peer
     * @param int $duration
     * @param PhoneCallDiscardReason $reason
     * @param int $connectionId
     * @param true|null $video
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly int $duration,
        public readonly PhoneCallDiscardReason $reason,
        public readonly int $connectionId,
        public readonly ?true $video = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->duration);
        $buffer .= $this->reason->serialize();
        $buffer .= Serializer::int64($this->connectionId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}