<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/broadcastRevenueTransactionWithdrawal
 */
final class BroadcastRevenueTransactionWithdrawal extends AbstractBroadcastRevenueTransaction
{
    public const CONSTRUCTOR_ID = 1515784568;
    
    public string $_ = 'broadcastRevenueTransactionWithdrawal';
    
    /**
     * @param int $amount
     * @param int $date
     * @param string $provider
     * @param bool|null $pending
     * @param bool|null $failed
     * @param int|null $transactionDate
     * @param string|null $transactionUrl
     */
    public function __construct(
        public readonly int $amount,
        public readonly int $date,
        public readonly string $provider,
        public readonly ?bool $pending = null,
        public readonly ?bool $failed = null,
        public readonly ?int $transactionDate = null,
        public readonly ?string $transactionUrl = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) $flags |= (1 << 0);
        if ($this->failed) $flags |= (1 << 2);
        if ($this->transactionDate !== null) $flags |= (1 << 1);
        if ($this->transactionUrl !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->amount);
        $buffer .= $serializer->int32($this->date);
        $buffer .= $serializer->bytes($this->provider);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->transactionDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->transactionUrl);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $pending = ($flags & (1 << 0)) ? true : null;
        $failed = ($flags & (1 << 2)) ? true : null;
        $amount = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $provider = $deserializer->bytes($stream);
        $transactionDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $transactionUrl = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
            return new self(
            $amount,
            $date,
            $provider,
            $pending,
            $failed,
            $transactionDate,
            $transactionUrl
        );
    }
}