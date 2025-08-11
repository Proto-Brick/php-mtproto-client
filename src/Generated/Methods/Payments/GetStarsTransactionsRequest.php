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
    
    public string $_ = 'payments.getStarsTransactions';
    
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
     * @param bool|null $inbound
     * @param bool|null $outbound
     * @param bool|null $ascending
     * @param string|null $subscriptionId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $offset,
        public readonly int $limit,
        public readonly ?bool $inbound = null,
        public readonly ?bool $outbound = null,
        public readonly ?bool $ascending = null,
        public readonly ?string $subscriptionId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inbound) $flags |= (1 << 0);
        if ($this->outbound) $flags |= (1 << 1);
        if ($this->ascending) $flags |= (1 << 2);
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