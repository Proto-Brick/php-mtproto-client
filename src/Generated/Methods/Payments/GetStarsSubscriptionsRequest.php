<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\AbstractStarsStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsSubscriptions
 */
final class GetStarsSubscriptionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 52761285;
    
    public string $_ = 'payments.getStarsSubscriptions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsSubscriptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param bool|null $missingBalance
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly ?bool $missingBalance = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->missingBalance) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}