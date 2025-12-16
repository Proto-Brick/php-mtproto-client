<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starsRevenueStatus
 */
final class StarsRevenueStatus extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfebe5491;
    
    public string $predicate = 'starsRevenueStatus';
    
    /**
     * @param AbstractStarsAmount $currentBalance
     * @param AbstractStarsAmount $availableBalance
     * @param AbstractStarsAmount $overallRevenue
     * @param true|null $withdrawalEnabled
     * @param int|null $nextWithdrawalAt
     */
    public function __construct(
        public readonly AbstractStarsAmount $currentBalance,
        public readonly AbstractStarsAmount $availableBalance,
        public readonly AbstractStarsAmount $overallRevenue,
        public readonly ?true $withdrawalEnabled = null,
        public readonly ?int $nextWithdrawalAt = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->withdrawalEnabled) {
            $flags |= (1 << 0);
        }
        if ($this->nextWithdrawalAt !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->currentBalance->serialize();
        $buffer .= $this->availableBalance->serialize();
        $buffer .= $this->overallRevenue->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->nextWithdrawalAt);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $withdrawalEnabled = (($flags & (1 << 0)) !== 0) ? true : null;
        $currentBalance = AbstractStarsAmount::deserialize($stream);
        $availableBalance = AbstractStarsAmount::deserialize($stream);
        $overallRevenue = AbstractStarsAmount::deserialize($stream);
        $nextWithdrawalAt = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $currentBalance,
            $availableBalance,
            $overallRevenue,
            $withdrawalEnabled,
            $nextWithdrawalAt
        );
    }
}