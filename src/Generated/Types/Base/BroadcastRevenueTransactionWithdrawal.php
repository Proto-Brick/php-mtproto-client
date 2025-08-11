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
    public const CONSTRUCTOR_ID = 0x5a590978;
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pending) $flags |= (1 << 0);
        if ($this->failed) $flags |= (1 << 2);
        if ($this->transactionDate !== null) $flags |= (1 << 1);
        if ($this->transactionUrl !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->amount);
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::bytes($this->provider);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->transactionDate);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->transactionUrl);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $pending = ($flags & (1 << 0)) ? true : null;
        $failed = ($flags & (1 << 2)) ? true : null;
        $amount = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $provider = Deserializer::bytes($stream);
        $transactionDate = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $transactionUrl = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
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