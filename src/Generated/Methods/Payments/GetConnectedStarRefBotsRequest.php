<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\ConnectedStarRefBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getConnectedStarRefBots
 */
final class GetConnectedStarRefBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5869a553;
    
    public string $_ = 'payments.getConnectedStarRefBots';
    
    public function getMethodName(): string
    {
        return 'payments.getConnectedStarRefBots';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedStarRefBots::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $limit
     * @param int|null $offsetDate
     * @param string|null $offsetLink
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $limit,
        public readonly ?int $offsetDate = null,
        public readonly ?string $offsetLink = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->offsetDate !== null) $flags |= (1 << 2);
        if ($this->offsetLink !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->offsetDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->offsetLink);
        }
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}