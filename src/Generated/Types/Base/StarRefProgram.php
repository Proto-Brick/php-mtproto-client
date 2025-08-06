<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/starRefProgram
 */
final class StarRefProgram extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdd0c66f2;
    
    public string $_ = 'starRefProgram';
    
    /**
     * @param int $botId
     * @param int $commissionPermille
     * @param int|null $durationMonths
     * @param int|null $endDate
     * @param StarsAmount|null $dailyRevenuePerUser
     */
    public function __construct(
        public readonly int $botId,
        public readonly int $commissionPermille,
        public readonly ?int $durationMonths = null,
        public readonly ?int $endDate = null,
        public readonly ?StarsAmount $dailyRevenuePerUser = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->durationMonths !== null) $flags |= (1 << 0);
        if ($this->endDate !== null) $flags |= (1 << 1);
        if ($this->dailyRevenuePerUser !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->durationMonths);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->endDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->dailyRevenuePerUser->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $botId = $deserializer->int64($stream);
        $commissionPermille = $deserializer->int32($stream);
        $durationMonths = ($flags & (1 << 0)) ? $deserializer->int32($stream) : null;
        $endDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $dailyRevenuePerUser = ($flags & (1 << 2)) ? StarsAmount::deserialize($deserializer, $stream) : null;
        return new self(
            $botId,
            $commissionPermille,
            $durationMonths,
            $endDate,
            $dailyRevenuePerUser
        );
    }
}