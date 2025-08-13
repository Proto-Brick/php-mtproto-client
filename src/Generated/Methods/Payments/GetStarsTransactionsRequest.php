<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Payments\StarsStatus;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.getStarsTransactions
 */
final class GetStarsTransactionsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x69da4557;
    
    public string $predicate = 'payments.getStarsTransactions';
    
    public function getMethodName(): string
    {
        return 'payments.getStarsTransactions';
    }
    
    public function getResponseClass(): string
    {
        return StarsStatus::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $offset
     * @param int $limit
     * @param true|null $inbound
     * @param true|null $outbound
     * @param true|null $ascending
     * @param true|null $ton
     * @param string|null $subscriptionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?true $inbound = null,
        public readonly ?true $outbound = null,
        public readonly ?true $ascending = null,
        public readonly ?true $ton = null,
        public readonly ?string $subscriptionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inbound) $flags |= (1 << 0);
        if ($this->outbound) $flags |= (1 << 1);
        if ($this->ascending) $flags |= (1 << 2);
        if ($this->ton) $flags |= (1 << 4);
        if ($this->subscriptionId !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->subscriptionId);
        }
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}