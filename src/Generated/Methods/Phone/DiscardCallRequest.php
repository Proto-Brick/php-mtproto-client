<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPhoneCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPhoneCallDiscardReason;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.discardCall
 */
final class DiscardCallRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2999697856;
    
    public string $_ = 'phone.discardCall';
    
    public function getMethodName(): string
    {
        return 'phone.discardCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPhoneCall $peer
     * @param int $duration
     * @param AbstractPhoneCallDiscardReason $reason
     * @param int $connectionId
     * @param bool|null $video
     */
    public function __construct(
        public readonly AbstractInputPhoneCall $peer,
        public readonly int $duration,
        public readonly AbstractPhoneCallDiscardReason $reason,
        public readonly int $connectionId,
        public readonly ?bool $video = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->video) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->int32($this->duration);
        $buffer .= $this->reason->serialize($serializer);
        $buffer .= $serializer->int64($this->connectionId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}