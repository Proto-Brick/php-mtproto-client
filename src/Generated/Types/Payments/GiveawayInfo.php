<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.giveawayInfo
 */
final class GiveawayInfo extends AbstractGiveawayInfo
{
    public const CONSTRUCTOR_ID = 1130879648;
    
    public string $_ = 'payments.giveawayInfo';
    
    /**
     * @param int $startDate
     * @param bool|null $participating
     * @param bool|null $preparingResults
     * @param int|null $joinedTooEarlyDate
     * @param int|null $adminDisallowedChatId
     * @param string|null $disallowedCountry
     */
    public function __construct(
        public readonly int $startDate,
        public readonly ?bool $participating = null,
        public readonly ?bool $preparingResults = null,
        public readonly ?int $joinedTooEarlyDate = null,
        public readonly ?int $adminDisallowedChatId = null,
        public readonly ?string $disallowedCountry = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->participating) $flags |= (1 << 0);
        if ($this->preparingResults) $flags |= (1 << 3);
        if ($this->joinedTooEarlyDate !== null) $flags |= (1 << 1);
        if ($this->adminDisallowedChatId !== null) $flags |= (1 << 2);
        if ($this->disallowedCountry !== null) $flags |= (1 << 4);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->startDate);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int32($this->joinedTooEarlyDate);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->int64($this->adminDisallowedChatId);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->bytes($this->disallowedCountry);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $participating = ($flags & (1 << 0)) ? true : null;
        $preparingResults = ($flags & (1 << 3)) ? true : null;
        $startDate = $deserializer->int32($stream);
        $joinedTooEarlyDate = ($flags & (1 << 1)) ? $deserializer->int32($stream) : null;
        $adminDisallowedChatId = ($flags & (1 << 2)) ? $deserializer->int64($stream) : null;
        $disallowedCountry = ($flags & (1 << 4)) ? $deserializer->bytes($stream) : null;
            return new self(
            $startDate,
            $participating,
            $preparingResults,
            $joinedTooEarlyDate,
            $adminDisallowedChatId,
            $disallowedCountry
        );
    }
}