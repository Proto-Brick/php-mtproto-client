<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/starRefProgram
 */
final class StarRefProgram extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdd0c66f2;
    
    public string $predicate = 'starRefProgram';
    
    /**
     * @param int $botId
     * @param int $commissionPermille
     * @param int|null $durationMonths
     * @param int|null $endDate
     * @param AbstractStarsAmount|null $dailyRevenuePerUser
     */
    public function __construct(
        public readonly int $botId,
        public readonly int $commissionPermille,
        public readonly ?int $durationMonths = null,
        public readonly ?int $endDate = null,
        public readonly ?AbstractStarsAmount $dailyRevenuePerUser = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->durationMonths !== null) {
            $flags |= (1 << 0);
        }
        if ($this->endDate !== null) {
            $flags |= (1 << 1);
        }
        if ($this->dailyRevenuePerUser !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= Serializer::int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->durationMonths);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->endDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->dailyRevenuePerUser->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $botId = Deserializer::int64($__payload, $__offset);
        $commissionPermille = Deserializer::int32($__payload, $__offset);
        $durationMonths = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $endDate = (($flags & (1 << 1)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $dailyRevenuePerUser = (($flags & (1 << 2)) !== 0) ? AbstractStarsAmount::deserialize($__payload, $__offset) : null;

        return new self(
            $botId,
            $commissionPermille,
            $durationMonths,
            $endDate,
            $dailyRevenuePerUser
        );
    }
}