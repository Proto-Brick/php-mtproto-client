<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\SuggestedStarRefBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getSuggestedStarRefBots
 */
final class GetSuggestedStarRefBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd6b48f7;
    
    public string $_ = 'payments.getSuggestedStarRefBots';
    
    public function getMethodName(): string
    {
        return 'payments.getSuggestedStarRefBots';
    }
    
    public function getResponseClass(): string
    {
        return SuggestedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param int $limit
     * @param bool|null $orderByRevenue
     * @param bool|null $orderByDate
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?bool $orderByRevenue = null,
        public readonly ?bool $orderByDate = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->orderByRevenue) $flags |= (1 << 0);
        if ($this->orderByDate) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $serializer->bytes($this->offset);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}