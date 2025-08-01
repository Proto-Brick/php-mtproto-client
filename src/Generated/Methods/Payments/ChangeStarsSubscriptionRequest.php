<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.changeStarsSubscription
 */
final class ChangeStarsSubscriptionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3346466936;
    
    public string $_ = 'payments.changeStarsSubscription';
    
    public function getMethodName(): string
    {
        return 'payments.changeStarsSubscription';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $subscriptionId
     * @param bool|null $canceled
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $subscriptionId,
        public readonly ?bool $canceled = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canceled !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->subscriptionId);
        if ($flags & (1 << 0)) {
            $buffer .= ($this->canceled ? $serializer->int32(0x997275b5) : $serializer->int32(0xbc799737));
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}